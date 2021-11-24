<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class UsersTable extends LivewireDatatable
{
    public $model = User::class;
    protected $listners = ['refreshLivewireDatatable' => 'columns'];

    public function builder()
    {
        $user = Auth::user();
        if($user->hasRole(['Super Admin', 'Internal Auditor','General Manager','Board'])){
            return User::query()->leftJoin('branches', 'branches.id', 'users.branch_id');
        }
        elseif($user->hasRole(['Regional Manager'])){
            return User::query()->leftJoin('branches', 'branches.id', 'users.branch_id')
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
            Column::callback(['id', 'name'], function ($id, $name) {
                return view('livewire.users-table', ['id' => $id, 'name' => $name]);
            }),
            Column::name('name')->searchable(),

            Column::name('email')->searchable(),

            DateColumn::name('created_at'),
            BooleanColumn::name('active'),
            Column::name('branches.name')
                ->label('Branch'),
            Column::name('roles.name')
                ->label('Role'),
        ];
    }


}
