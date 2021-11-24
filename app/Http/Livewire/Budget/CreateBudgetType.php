<?php

namespace App\Http\Livewire\Budget;

use App\Models\Program\Financial\BudgetType;
use Livewire\Component;

class CreateBudgetType extends Component
{
    public $year, $start_date, $end_date, $type;

    public $budget_id;
    public $updateMode = false;

    protected $listeners = ['editBudgetType' => 'edit'];

    protected $rules = [
        'year' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        'type' => 'required',
    ];
    

    public function store(){
        $this->validate();

        $budget = BudgetType::create([
            'year' => $this->year,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'type' => $this->type,
            'added_by' => auth()->user()->id,
        ]);
        $this->emit('refreshLivewireDatatable');
        $this->clear();
        session()->flash('message', 'Budget Type Created Successfully.');
    }

    public function clear(){
        $this->year = '';
        $this->end_date = '';
        $this->start_date = '';
        $this->type = '';
    }

    public function edit($id){

        $this->updateMode = true;
        $budget = BudgetType::find($id);
        $this->budget_id = $budget->id;
        $this->year = $budget->year;
        $this->start_date = $budget->start_date;
        $this->end_date = $budget->end_date;
        $this->type = $budget->type;
        $this->openModal();
    }

    public function update(){
        $budget = BudgetType::find($this->budget_id);
        $budget->year = $this->year;
        $budget->start_date = $this->start_date;
        $budget->end_date = $this->end_date;
        $budget->type = $this->type;
        $budget->save();
        $this->emit('refreshLivewireDatatable');
        $this->closeModal();
        $this->updateMode = false;
        $this->clear();
        session()->flash('message', 'Budget Type Updated Successfully.');
    }

    public function openModal(){
        $this->dispatchBrowserEvent('openModal');
    }
    public function closeModal(){
        $this->dispatchBrowserEvent('closeModal');
    }


    public function render()
    {
        return view('livewire.budget.create-budget-type');
    }
}
