<?php

namespace App\Http\Livewire\Budget;

use App\Models\Cso;
use App\Models\Program\Financial\Budget;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class BudgetTable extends LivewireDatatable
{
    public $model = Budget::class;
    protected $listners = ['refreshLivewireDatatable' => 'columns'];

    public function builder()
    {
        $user = Auth::user();
        if($user->hasRole(['Community Development coordinator', 'Youth Development coordinator'])){
            return Budget::query()->where('added_by',Auth::user()->id)->leftJoin('users','users.id', '=', 'budgets.added_by');
        }
        elseif($user->hasRole(['Regional Manager', 'M&E Staff'])){
            return Budget::whereIn('added_by',json_decode(Auth::user()->subordinates))->where('is_draft',false)->leftJoin('users','users.id' , '=', 'budgets.added_by');
        }
        else{
            return Budget::query()->where('is_draft',false)->leftJoin('users','users.id', '=', 'budgets.added_by');
        }

    }

    public function columns()
    {
        return [
            NumberColumn::name('id'),
            Column::name('activity_code')->searchable(),
            Column::name('year')->searchable(),
            Column::name('no_of_units'),
            Column::name('cost_per_unit'),
            DateColumn::name('budget_valid_from'),
            DateColumn::name('budget_valid_to'),
            Column::name('users.name')->label('Added By'),
            BooleanColumn::name('reviewed'),
            BooleanColumn::name('Approved'),
            Column::callback(['id'], function ($id) {
                return view('livewire.budget.budget-table', ['id' => $id]);
            })
        ];
    }

    public function edit($id){
        $this->emit('editBudget', $id);
    }

}
