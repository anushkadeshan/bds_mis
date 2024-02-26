<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DsOffice;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class DsdAction extends Component
{
    use LivewireAlert;
    protected $listeners = ['selected'];
    public $values;

    public function selected($values){
        $this->values = $values;
       // $this->value_sum = $requests->sum('total_value');
        //$max_sum = $requests->sum('max_value');
        //$this->max_sum = $max_sum;
    }

    public function approved(){
        foreach($this->values as $key => $value){
            $gn =  DsOffice::where('id',$value)->first();
            $gn->is_working = true;
            $gn->save();
        }
        $this->emit('refreshLivewireDatatable');
        $this->alert('success','Working Areas added successfully');

    }

    public function delete(){
        foreach($this->values as $key => $value){
            $gn =  DsOffice::where('id',$value)->first();
            $gn->is_working = false;
            $gn->save();
        }
        $this->emit('refreshLivewireDatatable');
        $this->alert('success','Working Areas added removed successfully');

    }
    public function render()
    {
        return view('livewire.dsd-action');
    }
}
