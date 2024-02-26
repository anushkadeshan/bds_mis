<?php

namespace App\Http\Livewire\LogFrame;

use App\Models\Logframe\Output;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class OutputTable extends LivewireDatatable
{
    protected $listners = ['refreshLivewireDatatable' => 'columns'];
    public function builder(){
        return Output::query()->leftJoin('outcomes', 'outcomes.id', 'outputs.outcome_id');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id'),
            Column::callback(['id'], function ($id) {
                return view('livewire.log-frame.output-table', ['id' => $id]);
            }),
            Column::name('code'),
            Column::name('output'),
            Column::name('outcomes.outcome')->label('Out Come'),
        ];
    }

}
