<?php

namespace App\Http\Livewire\Reports;

use Livewire\Component;

class Menu extends Component
{
    public $runningChart = false;

    public function runningChart(){
        $this->runningChart = true;
    }
    public function render()
    {
        return view('livewire.reports.menu');
    }
}
