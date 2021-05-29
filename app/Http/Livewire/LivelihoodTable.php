<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ImproveLivilyhood;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class LivelihoodTable extends LivewireDatatable
{
    public $model = ImproveLivilyhood::class;

    public function builder()
    {
        return ImproveLivilyhood::query()->leftJoin('gn_office', 'gn_office.id', 'improve_livilyhoods.gnd_id')->leftJoin('dsd_office', 'dsd_office.id', 'improve_livilyhoods.dsd_id');
        

    }

    public function columns()
    {
        return [
            NumberColumn::name('id'),

            Column::name('responsible_officer')->searchable()->editable()->filterable(),
            Column::name('financial_year')->searchable()->filterable(),
            Column::name('disctrict')->filterable(),
            Column::name('dsd_office.name')
                ->label('DS Office Name')->searchable()->filterable(),
            Column::name('gn_office.name')
                ->label('GN Office Name')->searchable()->filterable(),
            DateColumn::name('date_of_start')->filterable(),
            DateColumn::name('date_of_end')->filterable(),

            Column::callback(['id'], function ($id) {
                return view('livewire.livelihood-table', ['id' => $id]);
            })
        ];
    }
}
