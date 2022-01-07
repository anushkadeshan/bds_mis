<?php

namespace App\Http\Livewire\MobileApp;

use App\Models\Api\Trip;
use Livewire\Component;

class TripDetailView extends Component
{
    public $startdate;
    public $enddate;
    public $trips = [];

    public $daterange = '';

    public function updatedEnddate(){
        $this->daterange = $this->startdate. ' to '. $this->enddate;
        $this->trips = Trip::whereBetween('date',[$this->startdate,$this->enddate])
        ->groupBy('date')->get();
    }

    public function render()
    {
        return view('livewire.mobile-app.trip-detail-view');
    }
}
