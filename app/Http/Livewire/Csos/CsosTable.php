<?php

namespace App\Http\Livewire\Csos;

use App\Models\Cso;
use Illuminate\Support\Facades\Auth;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class CsosTable extends LivewireDatatable
{
    public $model = Cso::class;
    protected $listners = ['refreshLivewireDatatable' => 'columns'];

    public function builder()
    {
        $user = Auth::user();
        if($user->hasRole(['Community Development coordinator', 'Youth Development coordinator'])){
            return Cso::query()->withCount('members')->leftJoin('dsd_office', 'dsd_office.id', '=', 'csos.dsd_id')->leftJoin('gn_office', 'gn_office.id', '=', 'csos.gn_id')
            ->where('branch_id',Auth::user()->branch_id);
        }
        elseif($user->hasRole(['Regional Manager', 'M&E Staff'])){
            return Cso::query()->withCount('members')->leftJoin('dsd_office', 'dsd_office.id', '=', 'csos.dsd_id')->leftJoin('gn_office', 'gn_office.id', '=', 'csos.gn_id')
            ->whereIn('branch_id',json_decode(Auth::user()->branches));
        }
        else{
            return Cso::query()->withCount('members')->leftJoin('dsd_office', 'dsd_office.id', '=', 'csos.dsd_id')->leftJoin('gn_office', 'gn_office.id', '=', 'csos.gn_id');
        }

    }

    public function columns()
    {
        return [
            NumberColumn::name('id'),
            Column::name('name')->searchable(),
            Column::name('reg_no')->searchable(),
            Column::name('district')->searchable(),
            Column::name('gn_office.name')->searchable()->label('GN Division'),
            Column::name('dsd_office.name')->searchable()->label('DS Division'),
            Column::name('category')->searchable(),
            Column::callback(['id'], function ($id) {
                return view('livewire.csos.csos-table', ['id' => $id]);
            })
        ];
    }
}
