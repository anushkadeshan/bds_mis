<?php

namespace App\Http\Livewire;

use App\Models\LivelihoodFamily;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class LivelihoodfamilyTable extends LivewireDatatable
{

    public $model = LivelihoodFamily::class;
    protected $listners = ['refreshLivewireDatatable' => 'columns'];


    public function columns()
    {
        return [
            NumberColumn::name('id'),

            Column::name('district')->searchable(),
            Column::name('date_of_interviewed')->searchable(),
            Column::name('village')->searchable(),
            Column::name('hh_name')->searchable(),
            Column::name('hh_contact')->searchable(),


            Column::callback(['id'], function ($id) {
                return view('livewire.livelihoodfamily-table', ['id' => $id]);
            })
        ];
    }
}
