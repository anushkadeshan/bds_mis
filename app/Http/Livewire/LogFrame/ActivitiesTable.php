<?php

namespace App\Http\Livewire\LogFrame;

use App\Models\LogFrame\Activity;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ActivitiesTable extends LivewireDatatable
{
    public $model = Activity::class;
    protected $listners = ['refreshLivewireDatatable' => 'columns'];

    public function columns()
    {
        return [
            NumberColumn::name('id'),
            Column::callback(['id'], function ($id) {
                return view('livewire.log-frame.activities-table', ['id' => $id]);
            }),
            Column::name('code'),
            Column::name('name'),
            Column::name('type'),
            Column::name('created_at'),

        ];
    }
}
