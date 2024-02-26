<?php

namespace App\Http\Livewire\LogFrame;

use App\Models\Logframe\Outcome;
use Livewire\Component;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class OutcomeTable extends LivewireDatatable
{
    protected $listners = ['refreshLivewireDatatable' => 'columns'];
    public function builder(){
        return Outcome::query()->leftJoin('pre_conditions', 'pre_conditions.id', 'outcomes.pre_condition_id');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id'),
            Column::callback(['id'], function ($id) {
                return view('livewire.log-frame.outcome-table', ['id' => $id]);
            }),
            Column::name('code'),
            Column::name('outcome'),
            Column::name('pre_conditions.pre_condition')->label('Pre Condition'),
        ];
    }

}
