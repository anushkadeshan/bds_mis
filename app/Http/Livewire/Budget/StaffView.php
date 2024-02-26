<?php

namespace App\Http\Livewire\Budget;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isNull;

class StaffView extends Component
{
    use WithPagination;

    public $staff = [];
    public $staff_id = null;

    public function updatedStaffId($value)
    {
        $this->staff_id = $value;
        $this->render();
    }
    public function render()
    {
        $branches = auth()->user()->gnds;
       // dd(json_decode($branches));
        if(is_null($branches)){
           // dd($branches);
            $this->staff = User::with('roles')->get();
        }
        else{
            $this->staff = User::with('roles')->whereJsonContains('gnds',json_decode($branches))->get();
        }
        if ($this->staff_id == null) {
            //dd($id);
            $budgets = DB::table('budgets')->join('activities', 'activities.id', '=', 'budgets.activity_id')->join('outputs', 'outputs.id', '=', 'budgets.output_id')->join('users', 'users.id', '=', 'budgets.added_by')
                ->select('users.name as username', 'outputs.output as output', 'activities.*', 'budgets.*')->paginate(10);

        } else {
            $budgets = DB::table('budgets')
                ->join('activities', 'activities.id', '=', 'budgets.activity_id')
                ->join('outputs', 'outputs.id', '=', 'budgets.output_id')
                ->join('users', 'users.id', '=', 'budgets.added_by')
                ->select('users.name as username', 'outputs.output as output', 'activities.*', 'budgets.*')
                ->where('activity_id', $this->staff_id)
                ->paginate(10);
        }
        return view('livewire.budget.staff-view', ['budgets' => $budgets]);
    }

}
