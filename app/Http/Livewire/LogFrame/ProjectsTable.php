<?php

namespace App\Http\Livewire\LogFrame;

use Livewire\Component;
use App\Models\Logframe\Project;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class ProjectsTable extends LivewireDatatable
{
    public $model = Project::class;
    protected $listners = ['refreshLivewireDatatable' => 'columns'];

    public function columns()
    {
        return [
            NumberColumn::name('id'),
            Column::callback(['id'], function ($id) {
                return view('livewire.log-frame.projects-table', ['id' => $id]);
            }),
            Column::name('name'),
            Column::name('district'),
            Column::name('started_at'),
            Column::name('end_at'),
            NumberColumn::name('budget'),
        ];
    }

}
