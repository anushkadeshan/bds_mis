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
            Column::callback(['id'], function ($id) {
                return view('livewire.skill.employers.employers-table', ['id' => $id]);
            }),
            Column::name('name')->searchable(),
            Column::name('address')->searchable(),
            Column::name('company_type')->searchable(),
            Column::name('industry')->searchable(),
            Column::name('phone')->searchable(),
            Column::name('email')->searchable(),

        ];
    }
}
