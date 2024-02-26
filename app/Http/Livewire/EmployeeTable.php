<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use App\Exports\EmployeeExport;
use Illuminate\Database\Eloquent\Builder;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class EmployeeTable extends DataTableComponent
{
    use LivewireAlert;
    public bool $responsive = false;
    public $refresh = true;
    public $delete_id;

    protected $listeners = [
        'confirmed'
    ];

    public array $bulkActions = [
        'exportSelected' => 'Export',
    ];

    public function columns(): array
    {
        return [
            Column::make('id')->sortable()
                ->searchable(),
            Column::make('epf')->sortable()
                ->searchable(),
            Column::make('title')->sortable()
                ->searchable(),
            Column::make('full_name')->sortable()
                ->searchable(),
            Column::make('date_of_birth')->sortable()
                ->searchable(),
            Column::make('branch')->sortable()
                ->searchable(),
            Column::make('mobile_number')->sortable()
                ->searchable(),
            Column::make('company')->sortable()
                ->searchable(),
            Column::blank()->addClass('hidden md:table-cell'),
        ];
    }

    public function query(): Builder
    {
        return Employee::query()->orderBy('id','desc');
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

    public function delete($id){
        $this->delete_id = $id;
        $this->alert('warning', 'Are you Sure ?', [
            'toast' => false,
            'showDenyButton' => true,
            'denyButtonText' => 'Yes',
            'showCancelButton' => true,
            'cancelButtonText' => 'Cancel',
            'onDenied' => 'confirmed',
            'onDismissed' => 'cancelled',
            'timer' => null,
            'position' => 'center',
        ]);
    }

    public function confirmed(){
        $delete = Employee::where('id',$this->delete_id)->delete();
        if($delete){
            $this->alert('success', 'Employed removed successfully');
        }
        else{
            $this->alert('error', 'Something Error');

        }
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.employee_table';
    }
}
