<?php

namespace App\Http\Livewire\Skill\Youths;

use App\Models\skill\Youth;
use Livewire\Component;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Auth;

class YouthTable extends LivewireDatatable
{

    public $model = Youth::class;
    protected $listners = ['refreshLivewireDatatable' => 'columns'];

    public function builder()
    {
        $user = Auth::user();
        if($user->hasRole(['Community Development coordinator', 'Youth Development coordinator'])){
            return Youth::query()->leftJoin('families', 'families.id', 'youths.family_id')
                ->leftJoin('branches', 'branches.id', 'youths.branch_id')
                ->where('branch_id',Auth::user()->branch_id);
        }
        elseif($user->hasRole(['Regional Manager', 'M&E Staff'])){
            return Youth::query()->leftJoin('families', 'families.id', 'youths.family_id')
                ->leftJoin('branches', 'branches.id', 'youths.branch_id')
                ->whereIn('branch_id',json_decode(Auth::user()->branches));
        }
        else{
            return Youth::query()->leftJoin('families', 'families.id', 'youths.family_id')
            ->leftJoin('branches', 'branches.id', 'youths.branch_id')
            ->whereNotIn('branch_id',[9,10,11,4]);
        }
    }

    public function columns()
    {
        return [
            NumberColumn::name('id'),
            Column::name('name')->searchable()->editable(),
            Column::name('full_name')->searchable(),
            Column::name('nic')->searchable()->editable(),
            Column::name('gender')->searchable(),
            Column::name('branches.name')
                    ->label('Branch Name')->searchable()->filterable(),
            Column::callback(['id'], function ($id) {
                return view('livewire.skill.youths.youth-table', ['id' => $id]);
            })
        ];
    }

}
