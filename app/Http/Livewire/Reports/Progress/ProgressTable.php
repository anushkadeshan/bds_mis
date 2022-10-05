<?php

namespace App\Http\Livewire\Reports\Progress;

use App\Models\DsOffice;
use App\Models\GnOffice;
use App\Models\Program\Progress;
use Illuminate\Database\Eloquent\Builder;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class ProgressTable extends DataTableComponent
{
    use LivewireAlert;
    public $dsds = [];
    public $gnds = [];
    public $years = [];
    public bool $columnSelect = true;

    public array $bulkActions = [
        'exportSelected' => 'Export',
    ];

    public function columns(): array
    {
        return [
            Column::make('id'),
            Column::make('Title','title'),
            Column::make('Year','completed_date'),
            Column::make('DSD', 'dsd.name'),
            Column::make('GND', 'gnd.name'),
            Column::make('Planned Units', 'budget.no_of_units'),
            Column::make('Achieved Units', 'no_of_units'),
            Column::make('Units %', 'no_of_units'),
            Column::make('Planned Cost', 'budget.cost_per_unit'),
            Column::make('Total Cost', 'total_cost'),
            Column::make('Financial %', 'no_of_units'),
            Column::make('Completed Date', 'completed_date'),
        ];
    }

    public function mount(){
        $ds_array = Progress::distinct('dsd_id')->pluck('dsd_id')->toArray();
        $dsds = DsOffice::whereIn('id',$ds_array)->pluck('name','id')->toArray();
        $empty = ['' => 'Any'];
        $merged = array_replace($empty ,$dsds);
        $this->dsds = $merged;


        $gn_array = Progress::distinct('gn_id')->pluck('gn_id')->toArray();
        $gnds = GnOffice::whereIn('id',$gn_array)->pluck('name','id')->toArray();
        $merged_gn = array_replace($empty ,$gnds);
        $this->gnds = $merged_gn;

        $years = Progress::distinct('financial_year')->pluck('financial_year')->toArray();
        $mergedYear = array_replace($empty ,$years);
        $this->years = $mergedYear;
        //dd(Progress::with('dsd','gnd','budget')->get());
    }

    public function query(): Builder
    {
        return Progress::query()->with('dsd','gnd','budget')
            ->when($this->getFilter('dsd'), fn ($query, $dsd) => $query->where('dsd_id', $dsd))
            ->when($this->getFilter('gnd'), fn ($query, $dsd) => $query->where('gn_id', $dsd))
            ->when($this->getFilter('year'), fn ($query, $year) => $query->where('financial_year', $year))
            ->when($this->getFilter('date'), fn ($query, $date) => $query->where('completed_date', $date))
            ->when($this->getFilter('completed_date_from'), fn($query, $date) => $query->where('completed_date', '>=', $date))
            ->when($this->getFilter('completed_date_to'), fn($query, $date) => $query->where('completed_date', '<=', $date));
    }

    public function filters(): array
    {
        return [
            'dsd' => Filter::make('DSD')->select($this->dsds),
            'gnd' => Filter::make('GND')->select($this->gnds),
            'year' => Filter::make('Financial Year')->select($this->years),
            'completed_date_from' => Filter::make('Completed Date From')->date(),
            'completed_date_to' => Filter::make('Completed Date To')->date(),
        ];
    }

    public function exportSelected()
    {
        //dd($this->selectedRowsQuery());
        if ($this->selectedRowsQuery->count() > 0) {
            return (new EmployeeExport($this->selectedRowsQuery))->download(now().'.xlsx');
        }
        else{
            $this->alert('warning', 'Please select rows to export');
        }
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.progress-table';
    }
}
