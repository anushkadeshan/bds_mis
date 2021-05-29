<?php

namespace App\Http\Livewire;

use App\Models\Role;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class RoleTable extends LivewireDatatable
{
    public $model = Role::class;
    protected $listners = ['refreshLivewireDatatable' => 'columns'];
    public function columns()
    {
        return [
            NumberColumn::name('id'),

            Column::name('name')->searchable(),

            Column::name('guard_name')->searchable(),

            DateColumn::name('created_at'),

            Column::callback(['id', 'name'], function ($id, $name) {
                return view('livewire.role-table', ['id' => $id, 'name' => $name]);
            })
        ];
    }

}