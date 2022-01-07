<?php

namespace App\Http\Livewire\Reports\Progress;

use App\Models\DsOffice;
use App\Models\GnOffice;
use App\Models\Program\Progress;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class ProgressTable extends DataTableComponent
{
    public $dsds = [];
    public $gnds = [];

    public bool $columnSelect = true;

    public array $bulkActions = [
        'exportSelected' => 'Export',
    ];

    public function columns(): array
    {
        return [
            Column::make('id'),
            Column::make('Year','completed_date'),
            Column::make('DSD', 'dsd.name'),
            Column::make('GND', 'gnd.name'),
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

    }

    public function query(): Builder
    {
        return Progress::query()->with('dsd','gnd')
            ->when($this->getFilter('dsd'), fn ($query, $dsd) => $query->where('dsd_id', $dsd))
            ->when($this->getFilter('gnd'), fn ($query, $dsd) => $query->where('gn_id', $dsd));
    }

    public function filters(): array
    {
        return [
            'dsd' => Filter::make('DSD')->select($this->dsds),
            'gnd' => Filter::make('GND')->select($this->gnds),
        ];
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.progress-table';
    }
}
