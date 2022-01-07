<?php

namespace App\Http\Livewire\Progress;

use Livewire\Component;
use App\Models\Program\Progress;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class ProgressTable extends Component
{
    use WithPagination;

    public function edit($id){
        $this->emit('editBudget', $id);
    }

    public function render(){
        $gnds = Auth::user()->gnds;
        $progreses = Progress::with('addedBy','activity','budget')->whereIn('gn_id',json_decode($gnds))->paginate(10);
        //dd($this->progreses);
        return view('livewire.progress.progress-table',['progreses'=> $progreses]);
    }

}
