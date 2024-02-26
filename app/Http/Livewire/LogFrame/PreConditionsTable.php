<?php

namespace App\Http\Livewire\LogFrame;

use App\Models\Logframe\PreCondition;
use Livewire\Component;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class PreConditionsTable extends LivewireDatatable
{

    protected $listners = ['refreshLivewireDatatable' => 'columns'];
    public function builder(){
        return PreCondition::query()->leftJoin('projects', 'projects.id', 'pre_conditions.project_id');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id'),
            Column::callback(['id'], function ($id) {
                return view('livewire.log-frame.pre-conditions-table', ['id' => $id]);
            }),
            Column::name('code'),
            Column::name('pre_condition'),
            Column::name('projects.name')->label('Project Name'),
        ];
    }

}
