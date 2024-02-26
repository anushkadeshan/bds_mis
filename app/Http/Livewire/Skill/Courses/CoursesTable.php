<?php

namespace App\Http\Livewire\Skill\Courses;

use Livewire\Component;
use App\Models\skill\Course;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class CoursesTable extends LivewireDatatable
{
    public $model = Course::class;
    protected $listners = ['refreshLivewireDatatable' => 'columns'];

    public function builder()
    {
        return Course::query()->leftJoin('course_categories','course_categories.id', 'courses.course_catogery');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id'),
            Column::name('name')->searchable(),
            Column::name('duration')->searchable(),
            Column::name('course_fee')->searchable(),
            Column::name('course_type')->searchable(),
            Column::name('medium')->searchable()->editable(),
            Column::name('course_categories.course_category')
                ->label('Category')->searchable(),
            Column::callback(['id'], function ($id) {
                return view('livewire.skill.courses.courses-table', ['id' => $id]);
            })
        ];
    }

}
