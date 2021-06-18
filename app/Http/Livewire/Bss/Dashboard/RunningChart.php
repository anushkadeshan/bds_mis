<?php

namespace App\Http\Livewire\Bss\Dashboard;

use App\Models\bss\Pyament;
use Livewire\Component;
use App\Models\bss\Student;
use DB;
use Auth;

class RunningChart extends Component
{
    public $values;
    public $labels;

    public function mount(){
        $user = Auth::user();
        $status = 1;
        if($user->hasRole(['Community Development coordinator', 'Youth Development coordinator'])){
            $students = Student::select(DB::raw('count(*) as total'),'payment_details.p_status')
                ->join('payment_details','payment_details.student_id','=','students.id')
                ->groupBy('payment_details.p_status')
                ->orderBy('p_status')
                ->whereNotIn('branch_id',[9,10,11,4])
                 ->get()->toArray();
                $values = array_column($students, 'total');
                $labels = array_column($students, 'p_status');

                dd($labels,$students);

        }
        elseif($user->hasRole(['Regional Manager', 'M&E Staff'])){
            $students = Student::with(['branch'])
            ->whereHas('payment', function ($query) use ($status)
            {
                $query->where('p_status',$status);
            })
            ->select('branch_id', DB::raw('count(*) as total'))
                 ->groupBy('branch_id')
                 ->whereIn('branch_id',json_decode(Auth::user()->branches))
                 ->get()->toArray();
        }
        else{
            $students = Student::with(['branch'])->select(['branch_id', DB::raw('count(*) as total')])
            ->whereHas('payment', function ($query) use ($status)
            {
                $query->where('p_status',$status);
            })
                ->groupBy('branch_id')
                 ->whereNotIn('branch_id',[9,10,11,4])
                 ->get()->toArray();

            $values = array_column($students, 'total');
            $values2 = array_column($students, 'branch');
            $labels = array_column($values2, 'ext');

        }


        $this->values =$values;
        $this->labels =$labels;

    }
    public function render()
    {
        return view('livewire.bss.dashboard.running-chart');
    }
}
