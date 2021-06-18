<?php

namespace App\Http\Livewire\Bss\Dashboard;

use App\Models\bss\Student;
use Livewire\Component;
use Auth;

class Dashbord extends Component
{
    public $total;
    public $total_2021;
    public $bmic;
    public $bmic_2021;

    protected $listeners  = ['Created' =>'$refresh'];

    public function mount(){
        $year = now()->year;
        $user = Auth::user();
        if($user->hasRole(['Community Development coordinator', 'Youth Development coordinator'])){
            $this->total = Student::where('branch_id',Auth::user()->branch_id)->count();
            $this->total_2021 = Student::whereHas('payment', function($q) use($year){
                $q->where('payment_start_year', '=', $year);
            })
            ->where('branch_id',Auth::user()->branch_id)->count();
            $this->bmic = Student::where('direct_by_bmic',1)->where('branch_id',Auth::user()->branch_id)->count();
            $this->bmic_2021 = Student::whereHas('payment', function($q) use($year){
                $q->where('payment_start_year', '=', $year);
            })
            ->where('direct_by_bmic',1)
            ->where('branch_id',Auth::user()->branch_id)->count();
        }
        elseif($user->hasRole(['Regional Manager', 'M&E Staff'])){
            $this->total = Student::whereIn('branch_id',json_decode(Auth::user()->branches))->count();
            $this->total_2021 = Student::whereHas('payment', function($q) use($year){
                $q->where('payment_start_year', '=', $year);
            })
            ->whereIn('branch_id',json_decode(Auth::user()->branches))->count();
            $this->bmic = Student::where('direct_by_bmic',1)->whereIn('branch_id',json_decode(Auth::user()->branches))->count();
            $this->bmic_2021 = Student::whereHas('payment', function($q) use($year){
                $q->where('payment_start_year', '=', $year);
            })
            ->where('direct_by_bmic',1)
            ->whereIn('branch_id',json_decode(Auth::user()->branches))->count();
        }
        else{
            $this->total = Student::whereNotIn('branch_id',[9,10,11,4])->count();
            $this->total_2021 = Student::whereHas('payment', function($q) use($year){
                $q->where('payment_start_year', '=', $year);
            })->whereNotIn('branch_id',[9,10,11,4])->count();
            $this->bmic = Student::where('direct_by_bmic',1)->whereNotIn('branch_id',[9,10,11,4])->count();
            $this->bmic_2021 = Student::whereHas('payment', function($q) use($year){
                $q->where('payment_start_year', '=', $year);
            })
            ->whereNotIn('branch_id',[9,10,11,4])
            ->where('direct_by_bmic',1)->count();
        }

        //$this->total_2021 = Student::with('payment')->where('payments.payment_start_year',now()->year)->get();

    }

    public function render()
    {

        return view('livewire.bss.dashboard.dashbord');
    }
}
