<?php

namespace App\Http\Livewire\Skill\Institutes;

use App\Models\skill\Institute;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class InstituteTable extends LivewireDatatable
{
    public $model = Institute::class;
    protected $listners = ['refreshLivewireDatatable' => 'columns'];

    public function columns()
    {
        return [
            NumberColumn::name('id'),
            Column::name('name')->searchable(),
            Column::name('phone')->searchable(),
            Column::name('contact_person')->searchable(),
            Column::name('email')->searchable(),
            Column::name('type')->searchable(),
            Column::callback(['id'], function ($id) {
                return view('livewire.skill.institutes.institute-table', ['id' => $id]);
            })
        ];
    }

}
