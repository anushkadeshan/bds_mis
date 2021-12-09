<?php

namespace App\Http\Livewire\LogFrame;

use App\Models\Program\CompletionReport;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class CompletionReportTable extends LivewireDatatable
{
    public $model = CompletionReport::class;
    protected $listners = ['refreshLivewireDatatable' => 'columns'];

    public function builder()
    {
        return CompletionReport::query()->leftJoin('gn_office', 'gn_office.id', 'completion_reports.gnds')->leftJoin('dsd_office', 'dsd_office.id', 'completion_reports.dsd');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id'),
            Column::name('responsible_officer')->searchable(),
            Column::name('financial_year')->searchable(),
            Column::name('dsd_office.name')
                ->label('DS Office Name')->searchable(),
            Column::name('gn_office.name')
                ->label('GN Office Name')->searchable(),
            Column::name('date_of_start'),
            Column::name('date_of_end'),
            Column::callback(['id'], function ($id) {
                return view('livewire.log-frame.completion-report-table', ['id' => $id]);
            })
        ];
    }

}
