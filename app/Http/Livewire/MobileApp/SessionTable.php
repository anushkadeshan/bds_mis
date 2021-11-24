<?php

namespace App\Http\Livewire\MobileApp;

use App\Models\Api\Session;
use Illuminate\Support\Facades\Auth;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\TimeColumn;

use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class SessionTable extends LivewireDatatable
{
    public $model = Session::class;
    public function builder()
    {
        $user = Auth::user();
        if($user->hasRole(['Community Development coordinator', 'Youth Development coordinator'])){
            return Session::query()->leftJoin('users', 'users.id', 'field_sessions.user_id')->where('user_id.',$user->id);
        }

        elseif($user->hasRole(['Regional Manager', 'M&E Staff'])){
            return Session::query()->leftJoin('users', 'users.id', 'field_sessions.user_id')->whereIn('users.dsds',json_decode($user->dsds));
        }
        else{
            return Session::query()->leftJoin('users', 'users.id', 'field_sessions.user_id');
        }

    }

    public function columns()
    {
        return [
            NumberColumn::name('id'),
            Column::callback(['id'], function ($id) {
                return view('livewire.mobile-app.session-table', ['id' => $id]);
            }),
            Column::name('client')->searchable(),
            DateColumn::name('date')->filterable()->label('Session Date'),
            Column::name('start_address')->searchable()->filterable()->label('Address')->hide(),
            TimeColumn::name('start_time')->filterable()->label('Session Start Time'),
            TimeColumn::name('end_time')->filterable()->label('Session End Time'),
            Column::name('users.name')
            ->label('User Name')->searchable(),

        ];
    }
}
