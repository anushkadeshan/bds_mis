<?php

namespace App\Http\Livewire;

use App\Models\SentSMS;
use App\Exports\SentSMSExport;
use Illuminate\Database\Eloquent\Builder;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class SentSMSTable extends DataTableComponent
{

    use LivewireAlert;
    public bool $responsive = false;
    public $refresh = true;
    public bool $columnSelect = true;

    public array $bulkActions = [
        'exportSelected' => 'Export',
    ];

    public function columns(): array
    {
        return [
            Column::make('id')->selected(),
            Column::make('receiver')->selected(),
            Column::make('characters')->selected(),
            Column::make('epf'),
            Column::make('company')->selected(),
            Column::make('branch')->selected(),
            Column::make('response_id'),
            Column::make('response_status')->selected(),
            Column::make('response_data'),
            Column::make('created_at')->selected(),
        ];
    }

    public function exportSelected()
    {
        //dd($this->selectedRowsQuery());
        if ($this->selectedRowsQuery->count() > 0) {
            return (new SentSMSExport($this->selectedRowsQuery))->download(now().'.xlsx');
        }
        else{
            $this->alert('warning', 'Please select rows to export');
        }

    }

    public function query(): Builder
    {
        return SentSMS::query()->orderBy('created_at','desc');
    }
}
