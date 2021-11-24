<?php

namespace App\Http\Livewire\Task;

use App\Models\Task;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class TaskTable extends LivewireDatatable
{

    public $model = Task::class;
    protected $listners = ['refreshLivewireDatatable' => 'columns'];

    public function columns()
    {
        return [
            NumberColumn::name('id'),
            Column::name('name')->searchable(),
            Column::name('type')->searchable(),
            DateColumn::name('task_start_at'),
            DateColumn::name('task_end_at'),
            Column::name('importance'),
            Column::callback(['id'], function ($id) {
                return view('livewire.task.task-table', ['id' => $id]);
            })
        ];
    }

    public function edit($id){
        $this->emit('editTask', $id);
    }

}
