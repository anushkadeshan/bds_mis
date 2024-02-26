<?php

namespace App\Http\Livewire\MobileApp;

use Livewire\Component;

class ViewSession extends Component
{
    public $session = [];
    public function mount($session){
        $this->session = $session->toArray();
    }
    public function render()
    {
        return view('livewire.mobile-app.view-session');
    }
}
