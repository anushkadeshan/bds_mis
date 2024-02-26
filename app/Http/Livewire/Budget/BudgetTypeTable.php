<?php

namespace App\Http\Livewire\Budget;

use Livewire\Component;
use App\Models\Program\Financial\BudgetType;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class BudgetTypeTable extends LivewireDatatable
{
    public $model = BudgetType::class;
    protected $listners = ['refreshLivewireDatatable' => 'columns'];


    public function columns()
    {
        return [
            NumberColumn::name('id'),
            Column::name('Type')->label('Budget Type'),
            Column::name('year')->searchable(),
            DateColumn::name('start_date')->label('Budget Start Date'),
            DateColumn::name('end_date')->label('Budget End Date'),
            Column::callback(['id'], function ($id) {
                return view('livewire.budget.budget-type-table', ['id' => $id]);
            })
        ];
    }

    public function edit($id){
        $this->emit('editBudgetType', $id);
    }
}
