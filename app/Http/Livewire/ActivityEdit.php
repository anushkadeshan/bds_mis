<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Notifications\ApproveRecords;

class ActivityEdit extends Component
{
    public $changes;
    public $activity;

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

    public function render()
    {
        return view('livewire.activity-edit');
    }
}
