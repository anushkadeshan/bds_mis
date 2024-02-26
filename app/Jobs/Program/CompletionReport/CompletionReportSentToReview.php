<?php

namespace App\Jobs\Program\CompletionReport;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class CompletionReportSentToReview implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $budget;
    public $message;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($cr,$message)
    {
        $this->cr = $cr;
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $me = User::role('M&E Staff	')->whereJsonContains('subsubordinates',$this->cr->added_by)->get();
        $by = User::find($this->budget->added_by)->name;
        $title = $this->budget->activity_code .' '.$this->budget->boarder_activity;
        $message1 = $this->message.' by '.$by;
        $message2 = $title;
        //auth()->user()->notify(new BudgetBudgetSentToReview($this->budget,$message1,$message2));
        if(!empty($managers)){
            foreach($managers as $manager){
                $manager->notify(new BudgetBudgetSentToReview($this->budget,$message1,$message2));
            }
        }

    }
}
