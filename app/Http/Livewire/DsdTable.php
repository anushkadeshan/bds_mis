<?php

namespace App\Http\Livewire;

use App\Models\DsOffice;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DsdTable extends LivewireDatatable
{
    public $model = DsOffice::class;
    protected $listners = ['refreshLivewireDatatable' => 'columns'];


    public function columns()
    {
        return [
            NumberColumn::name('id'),

            Column::name('name')->searchable()->editable(),
            Column::name('district')->searchable(),
            Column::name('province')->searchable(),


            Column::callback(['id'], function ($id) {
                return view('livewire.dsd-table', ['id' => $id]);
            })
        ];
    }
}
