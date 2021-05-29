<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ResoursePerson;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ResourseTable extends LivewireDatatable
{
    public $model = ResoursePerson::class;
    protected $listners = ['refreshLivewireDatatable' => 'columns'];

    public function columns()
    {
        return [
            NumberColumn::name('id'),

            Column::name('name')->searchable()->editable(),
            Column::name('proffesion')->searchable()->editable(),
            Column::name('institute')->searchable()->editable(),
            Column::name('cv'),
            Column::callback(['id'], function ($id) {
                return view('livewire.resourse-table', ['id' => $id]);
            })
        ];
    }

}
