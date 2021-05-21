<?php

namespace App\Http\Livewire;

use App\Models\GnOffice;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

use Livewire\Component;

class GnTable extends LivewireDatatable
{
    public $model = GnOffice::class;
    protected $listners = ['refreshLivewireDatatable' => 'columns'];

    public function builder()
    {
        return GnOffice::query()->leftJoin('dsd_office', 'dsd_office.id', 'gn_office.dsd_id');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id'),

            Column::name('name')->searchable()->editable(),
            Column::name('dsd_office.name')
                ->label('DS Office Name')->searchable(),

            Column::callback(['id'], function ($id) {
                return view('livewire.gn-table', ['id' => $id]);
            })
        ];
    }
}
