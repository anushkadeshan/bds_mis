<?php

namespace App\Http\Livewire\Skill\Employers;

use Livewire\Component;
use App\Models\skill\Employer;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class EmployersTable extends LivewireDatatable
{
    public $model = Employer::class;
    protected $listners = ['refreshLivewireDatatable' => 'columns'];

    public function columns()
    {
        return [
            NumberColumn::name('id'),
            Column::name('name')->searchable()->editable(),
            Column::name('address')->searchable()->editable(),
            Column::name('company_type')->searchable()->editable(),
            Column::name('industry')->searchable(),
            Column::name('phone')->searchable()->editable(),
            Column::name('email')->searchable()->editable(),
            Column::callback(['id'], function ($id) {
                return view('livewire.skill.employers.employers-table', ['id' => $id]);
            })
        ];
    }
}
