<?php

namespace App\Jobs\Program\Budget;

use App\Models\User;
use App\Notifications\Program\Budget\NotifyBudgetDisapproved;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class BudgetDisApproved implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $budget;
    public $message;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($budget,$message)
    {
        $this->budget = $budget;
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $managers = User::where('id',$this->budget->reviewed_by)
            ->orWhere('id',$this->budget->added_by)
            ->get();
        $by = User::find($this->budget->approved_by)->name;
        $title = $this->budget->activity_code .' '.$this->budget->boarder_activity;
        $message1 = $this->message.' by '.$by;
        $message2 = $title;
        //auth()->user()->notify(new NotifyBudgetSentToApproval($this->budget,$message1,$message2));
        if(!empty($managers)){
            foreach($managers as $manager){
                $manager->notify(new NotifyBudgetDisapproved($this->budget,$message1,$message2));
            }
        }
    }
}
