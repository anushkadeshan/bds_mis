<?php

namespace App\Http\Livewire;

use App\Models\User;
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
        return User::query()->leftJoin('branches', 'branches.id', 'users.branch_id');
        return User::query()->leftJoin('model_has_roles', 'model_has_roles.id', 'users.branch_id');
    }
    public function columns()
    {
        return [
            NumberColumn::name('id'),

            Column::name('name')->searchable()->editable(),

            Column::name('email')->searchable(),

            DateColumn::name('created_at'),
            DateColumn::name('email_verified_at'),
            BooleanColumn::name('active'),
            Column::name('branches.name')
                ->label('Branch'),
            Column::name('roles.name')
                ->label('Role'),
            Column::callback(['id', 'name'], function ($id, $name) {
                return view('livewire.users-table', ['id' => $id, 'name' => $name]);
            })
        ];
    }

   
}
