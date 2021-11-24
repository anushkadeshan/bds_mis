<?php

namespace App\Http\Livewire\MobileApp;

use App\Models\Api\Session;
use App\Models\Api\Trip;
use Illuminate\Support\Facades\Auth;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\TimeColumn;

use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class TripTable extends LivewireDatatable
{
    public $hideable = 'select';
    public $exportable = true;
    public $complex = true;
    public $persistComplexQuery = true;

    public $model = Trip::class;
    public function builder()
    {
        $user = Auth::user();
        if($user->hasRole(['Community Development coordinator', 'Youth Development coordinator'])){
            return Trip::query()->leftJoin('users', 'users.id', 'trips.user_id')->where('user_id.',$user->id)->groupBy('trip_id');
        }

        elseif($user->hasRole(['Regional Manager', 'M&E Staff'])){
            return Trip::query()->leftJoin('users', 'users.id', 'trips.user_id')->whereIn('users.dsds',json_decode($user->dsds))->groupBy('trip_id');
        }
        else{
            return Trip::query()->leftJoin('users', 'users.id', 'trips.user_id')->groupBy('trip_id');
        }

    }

    public function columns()
    {
        return [
            NumberColumn::name('id'),
            DateColumn::name('date')->filterable()->label('Session Date'),
            Column::name('start_meter_reading')->searchable()->filterable(),
            Column::name('end_meter_reading')->searchable()->filterable(),
            Column::name('trip_start_location')->searchable()->filterable(),
            Column::name('trip_end_location')->searchable()->filterable(),
            NumberColumn::raw('round(distance,2)')->label('Distance Km'),
            TimeColumn::name('start_time')->filterable()->label('Trip Start Time'),
            TimeColumn::name('end_time')->filterable()->label('Trip End Time'),
            Column::name('users.name')
            ->label('User Name')->searchable()->filterable(),
            Column::callback(['id'], function ($id) {
                return view('livewire.mobile-app.trip-table', ['id' => $id]);
            })
        ];
    }
}
