<?php

namespace App\Http\Livewire;

use App\Models\Permission;


use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class PermissionTable extends LivewireDatatable
{
    public $model = Permission::class;

    public function columns()
    {

        return [
            NumberColumn::name('id'),

            Column::name('name')->searchable(),

            Column::name('guard_name')->searchable(),

            DateColumn::name('created_at'),

            Column::callback(['id', 'name'], function ($id, $name) {
                return view('livewire.permission-table', ['id' => $id, 'name' => $name]);
            })
        ];
    }


}
