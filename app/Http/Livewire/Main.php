<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Main extends Component
{
    public $slot;

    public function mount($slot){
        $this->slot = $slot;
    }
    public function render()
    {
        return view('livewire.main');
    }
}
