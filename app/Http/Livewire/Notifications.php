<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Notifications extends Component
{
    public $notifications;
    public function mount(){
        $this->notifications = auth()->user()->unreadNotifications->take(5);
    }

    public function markAsRead($id){

        $notification  = auth()->user()
                            ->unreadNotifications
                            ->where('my_id', $id)
                            ->first();

        if($notification) {
            $notification->markAsRead();
        }

        return redirect()->to($notification->data['url']);
    }

    public function render()
    {
        return view('livewire.notifications');
    }
}
