<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Activitylog\Models\Activity;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class MyActivities extends LivewireDatatable
{

    public function builder()
    {
        $userModel = auth()->user();
        return Activity::query()->leftJoin('users', 'users.id', 'activity_log.causer_id')->causedBy($userModel);
    }

    public function columns()
    {
        return [
            NumberColumn::name('id'),
            Column::name('description'),
            Column::name('subject_type'),
            Column::callback(['properties'], function ($properties) {
                return view('livewire.activity-log-properties', ['properties' => $properties]);
            })->label('Data'),
            BooleanColumn::name('approved'),
            Column::name('reject_reason'),
            Column::name('created_at'),

        ];
    }

}
