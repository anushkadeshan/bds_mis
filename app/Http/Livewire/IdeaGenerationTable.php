<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\IdeaGeneration;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;


class IdeaGenerationTable extends LivewireDatatable
{

    public $model = IdeaGeneration::class;
    protected $listners = ['refreshLivewireDatatable' => 'columns'];

    public function builder()
    {
        return IdeaGeneration::query()->leftJoin('gn_office', 'gn_office.id', 'idea_generations.gnd_id')->leftJoin('dsd_office', 'dsd_office.id', 'idea_generations.dsd_id');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id'),
            Column::name('responsible_officer')->searchable()->editable()->filterable(),
            Column::name('financial_year')->searchable()->filterable(),
            Column::name('dsd_office.name')
                ->label('DS Office Name')->searchable()->filterable(),
            Column::name('gn_office.name')
                ->label('GN Office Name')->searchable()->filterable(),
            Column::name('date_of_start')->filterable()->editable(),
            Column::name('date_of_end')->filterable()->editable(),
            Column::callback(['id'], function ($id) {
                return view('livewire.idea-generation-table', ['id' => $id]);
            })
        ];
    }
}

