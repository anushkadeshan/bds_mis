<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Activitylog\Models\Activity;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ActivityLogTable extends LivewireDatatable
{
    public $model = Activity::class;
    protected $listners = ['refreshLivewireDatatable' => 'columns'];

    public function builder()
    {
        return Activity::query()->leftJoin('users', 'users.id', 'activity_log.causer_id');
    }
    public function columns()
    {
        return [
            NumberColumn::name('id'),
            Column::name('description'),
            Column::name('subject_type'),
            Column::name('subject_id'),
            Column::name('properties'),
            Column::name('users.name')
                ->label('User Name')->searchable()->filterable(),
            Column::callback(['properties'], function ($properties) {
                return view('livewire.activity-log-properties', ['properties' => $properties]);
            }),
            Column::name('created_at'),
            Column::callback(['id'], function ($id) {
                return view('livewire.activity-log-table', ['id' => $id]);
            })
        ];
    }
}
