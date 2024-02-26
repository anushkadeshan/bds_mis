<?php

namespace App\Http\Livewire\MobileApp;

use Livewire\Component;

class ViewTrip extends Component
{
    public $trip = [];

    public function mount($trip){
        $this->trip = $trip->toArray();
    }

    public function render()
    {
        return view('livewire.mobile-app.view-trip');
    }
}
