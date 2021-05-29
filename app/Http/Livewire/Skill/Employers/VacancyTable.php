<?php

namespace App\Http\Livewire\Skill\Employers;

use Livewire\Component;
use App\Models\skill\Vacancy;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class VacancyTable extends LivewireDatatable
{
    public $model = Vacancy::class;
    protected $listners = ['refreshLivewireDatatable' => 'columns'];

    public function builder()
    {
        return Vacancy::query()->leftJoin('employers','employers.id', 'vacancies.employer_id');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id'),
            Column::name('title')->searchable()->editable(),
            Column::name('job_type')->searchable()->editable(),
            Column::name('industry')->searchable()->editable(),
            Column::name('location')->searchable(),
            Column::name('dedline')->searchable()->editable(),
            Column::name('salary')->searchable()->editable(),
            Column::name('employers.name')
                ->label('Employer')->searchable(),
            Column::callback(['id'], function ($id) {
                return view('livewire.skill.employers.vacancy-table', ['id' => $id]);
            })
        ];
    }
}
