<?php

namespace App\Http\Livewire\Skill\Vacancies;
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
            Column::callback(['id'], function ($id) {
                return view('livewire.skill.vacancies.vacancy-table', ['id' => $id]);
            }),
            Column::name('title')->searchable(),
            Column::name('job_type')->searchable(),
            Column::name('industry')->searchable(),
            Column::name('location')->searchable(),
            Column::name('dedline')->searchable(),
            Column::name('salary')->searchable(),
            Column::name('employers.name')
                ->label('Employer')->searchable(),

        ];
    }

}
