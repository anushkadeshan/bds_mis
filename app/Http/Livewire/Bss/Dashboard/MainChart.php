<?php

namespace App\Http\Livewire\Bss\Dashboard;

use Livewire\Component;
use App\Models\bss\Student;
use DB;
use Auth;

class MainChart extends Component
{
    public $values;
    public $labels;

    public function mount(){
        $user = Auth::user();
        if($user->hasRole(['Community Development coordinator', 'Youth Development coordinator'])){
            $students = Student::with(['branch'])->select('branch_id', DB::raw('count(*) as total'))
                 ->groupBy('branch_id')
                 ->where('branch_id',Auth::user()->branch_id)
                 ->get()->toArray();
        }
        elseif($user->hasRole(['Regional Manager', 'M&E Staff'])){
            $students = Student::with(['branch'])->select('branch_id', DB::raw('count(*) as total'))
                 ->groupBy('branch_id')
                 ->whereIn('branch_id',json_decode(Auth::user()->branches))
                 ->get()->toArray();
        }
        else{
            $students = Student::with(['branch'])->select('branch_id', DB::raw('count(*) as total'))
                 ->groupBy('branch_id')
                 ->whereNotIn('branch_id',[9,10,11,4])
                 ->get()->toArray();
        }

        $values = array_column($students, 'total');
        $values2 = array_column($students, 'branch');
        $labels = array_column($values2, 'ext');
        $this->values =$values;
        $this->labels =$labels;

    }
    public function render()
    {
        return view('livewire.bss.dashboard.main-chart');
    }
}
