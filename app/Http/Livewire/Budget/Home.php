<?php

namespace App\Http\Livewire\Budget;

use Livewire\Component;

class Home extends Component
{
    public $table= true;
    public $activity= false;
    public $staff= false;

    public function table(){
        $this->table= true;
        $this->activity= false;
        $this->staff= false;
    }
    
    public function activity(){
        $this->table= false;
        $this->activity= true;
        $this->staff= false;
    }

    public function staff(){
        $this->table= false;
        $this->activity= false;
        $this->staff= true;
    }

    public function render()
    {
        return view('livewire.budget.home');
    }
}
