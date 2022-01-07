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
    public $selected = [];
    public $model = DsOffice::class;
    protected $listners = ['refreshLivewireDatatable' => 'columns'];


    public function columns()
    {
        return [
            Column::checkbox(),
            NumberColumn::name('id'),
            Column::name('name')->searchable(),
            Column::name('district')->searchable(),
            Column::name('province')->searchable(),
            BooleanColumn::name('is_working')->searchable(),
            Column::callback(['id'], function ($id) {
                return view('livewire.dsd-table', ['id' => $id]);
            })
        ];
    }

    public function updatedSelected($value){
        $this->emit('selected', $this->selected);
    }
}
