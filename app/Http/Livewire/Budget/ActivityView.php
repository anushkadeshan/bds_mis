<?php

namespace App\Http\Livewire\Budget;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ActivityView extends Component
{
    use WithPagination;

    public $activities = [];
    public $activity_id = null;

    public function updatedActivityId($value)
    {
        $this->activity_id = $value;
        $this->render();
    }
    public function render()
    {
        $this->activities = DB::table('budgets')->join('activities', 'activities.id', '=', 'budgets.activity_id')->groupBy('activity_id')->get();
        if ($this->activity_id == null) {
            //dd($id);
            $budgets = DB::table('budgets')->join('activities', 'activities.id', '=', 'budgets.activity_id')->join('outputs', 'outputs.id', '=', 'budgets.output_id')->join('users', 'users.id', '=', 'budgets.added_by')
                ->select('users.name as username', 'outputs.output as output', 'activities.*', 'budgets.*')->paginate(10);

        } else {
            $budgets = DB::table('budgets')
                ->join('activities', 'activities.id', '=', 'budgets.activity_id')
                ->join('outputs', 'outputs.id', '=', 'budgets.output_id')
                ->join('users', 'users.id', '=', 'budgets.added_by')
                ->select('users.name as username', 'outputs.output as output', 'activities.*', 'budgets.*')
                ->where('activity_id', $this->activity_id)
                ->paginate(10);
        }
        return view('livewire.budget.activity-view', ['budgets' => $budgets]);
    }
}
