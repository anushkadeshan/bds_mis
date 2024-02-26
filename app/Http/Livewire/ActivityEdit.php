<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Notifications\RejectRecords;
use App\Notifications\ApproveRecords;
use Spatie\Activitylog\Models\Activity;

class ActivityEdit extends Component
{
    public $changes;
    public $activity;
    public $reason;

    public function mount($activity){
        $this->activity = $activity;
        $this->changes = $activity->changes;
    }

    public function approve(){
        $subject = $this->activity->subject;
        if($subject){
            $subject->approved = true;
            $subject->approved_by = auth()->user()->id;
            $subject->save();
        }
        $user = $this->activity->causer;
        $user->notify(new ApproveRecords($this->activity, $subject));

        //event(new ApproveRecords($user));
        session()->flash('message', 'Record is Approved.');

    }

    public function reject(){
        $this->validate([
            'reason' => 'required'
        ]);
        $activity = $this->activity;
        $activity->approved = false;
        $activity->reject_reason = $this->reason;
        $activity->save();

        session()->flash('message', 'Record is rejected.');
        $user = $this->activity->causer;
        $subject = $this->activity->subject;
        $user->notify(new RejectRecords($this->activity, $this->reason,$subject));
    }

    public function render()
    {
        return view('livewire.activity-edit');
    }
}
