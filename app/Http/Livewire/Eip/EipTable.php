<?php

namespace App\Http\Livewire\Eip;

use App\Models\Eip;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class EipTable extends LivewireDatatable
{

    public $model = Eip::class;
    protected $listners = ['refreshLivewireDatatable' => 'columns'];

    public function builder()
    {
        $user = Auth::user();
        if($user->hasRole(['Community Development coordinator', 'Youth Development coordinator'])){
            return Eip::query()->leftJoin('dsd_office', 'dsd_office.id', '=', 'eip_clients.dsd_id')
            ->where('branch_id',Auth::user()->branch_id);
        }
        elseif($user->hasRole(['Regional Manager', 'M&E Staff'])){
            return Eip::query()->leftJoin('dsd_office', 'dsd_office.id', '=', 'eip_clients.dsd_id')
            ->whereIn('branch_id',json_decode(Auth::user()->branches));
        }
        else{
            return Eip::query()->leftJoin('dsd_office', 'dsd_office.id', '=', 'eip_clients.dsd_id');
        }

    }

    public function columns()
    {
        return [
            NumberColumn::name('id'),
            Column::name('name')->searchable(),
            Column::name('address')->searchable(),
            Column::name('post_office')->searchable(),
            Column::name('dsd_office.name')->searchable()->label('DS Division'),
            Column::name('allowance')->searchable(),
            Column::callback(['id'], function ($id) {
                return view('livewire.eip.eip-table', ['id' => $id]);
            })
        ];
    }

}
