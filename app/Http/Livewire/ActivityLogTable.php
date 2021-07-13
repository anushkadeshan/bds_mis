<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
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
        $user = Auth::user();
        if($user->hasRole(['Super Admin', 'Internal Auditor','General Manager','Board'])){
            return Activity::query()->leftJoin('users', 'users.id', 'activity_log.causer_id');
        }
        elseif($user->hasRole(['Regional Manager'])){
            return Activity::query()->leftJoin('users', 'users.id', 'activity_log.causer_id')
            ->whereIn('users.branch_id',json_decode(Auth::user()->branches));
        }
        else{
            return null;
        }


    }
    public function columns()
    {
        return [
            NumberColumn::name('id'),
            Column::name('description'),
            Column::name('subject_type'),
            Column::name('users.name')
                ->label('User Name')->searchable(),
            Column::callback(['properties'], function ($properties) {
                return view('livewire.activity-log-properties', ['properties' => $properties]);
            })->label('Data'),
            Column::name('created_at'),
            Column::callback(['id'], function ($id) {
                return view('livewire.activity-log-table', ['id' => $id]);
            })
        ];
    }
}
