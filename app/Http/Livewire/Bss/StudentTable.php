<?php

namespace App\Http\Livewire\Bss;

use Livewire\Component;
use App\Models\bss\Student;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class StudentTable extends LivewireDatatable
{
    public $model = Student::class;
    protected $listners = ['refreshLivewireDatatable' => 'columns'];

    public function builder()
    {
        return Student::query()->leftJoin('gn_office', 'gn_office.id', 'students.gn_id')->leftJoin('dsd_office', 'dsd_office.id', 'students.dsd_id')->leftJoin('status', 'status.id', 'students.status_id');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id'),
            Column::name('name')->searchable()->editable()->filterable(),
            Column::name('nic')->searchable()->filterable(),
            Column::name('dsd_office.name')
                ->label('DS Office Name')->searchable()->filterable(),
            Column::name('gn_office.name')
                ->label('GN Office Name')->searchable()->filterable(),
            Column::name('contact')->filterable()->editable(),
            Column::name('al_year')->filterable()->editable(),
            Column::name('status.status')
                ->label('Current Status')->searchable()->filterable(),
            Column::callback(['id'], function ($id) {
                return view('livewire.bss.student-table', ['id' => $id]);
            })
        ];
    }
}
