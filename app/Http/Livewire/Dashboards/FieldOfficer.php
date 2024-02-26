<?php

namespace App\Http\Livewire\Dashboards;

use App\Models\Program\CompletionReport;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Program\Financial\Budget;

class FieldOfficer extends Component
{
    public $budget_to_be_reviewed;
    public $cr_to_be_reviewed;
    public $budget_to_be_approved;
    public $cr_to_be_approved;
    public function mount(){

        //to budget be reviewed
        $this->budget_to_be_reviewed = Budget::query()->where('added_by',Auth::user()->id)->where('is_draft',false)->where('reviewed',false)->count();

        //budget to_be approved
        $this->budget_to_be_approved = Budget::query()->where('added_by',Auth::user()->id)->where('is_draft',false)->where('approved',false)->where('reviewed',true)->count();

        //to budget be reviewed
        $this->cr_to_be_reviewed = CompletionReport::query()->where('added_by',Auth::user()->id)->where('is_draft',false)->whereNull('isReviewed')->count();

        //budget to_be approved
        $this->cr_to_be_approved = CompletionReport::query()->where('added_by',Auth::user()->id)->where('is_draft',false)->where('isApproved',false)->whereNotNull('isReviewed')->count();

    }

    public function render()
    {
        return view('livewire.dashboards.field-officer');
    }
}
