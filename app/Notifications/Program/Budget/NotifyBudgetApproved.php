<?php

namespace App\Notifications\Program\Budget;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifyBudgetApproved extends Notification
{
    use Queueable;

    public $budget;
    public $message1;
    public $message2;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($budget,$message1,$message2)
    {
        $this->budget = $budget;
        $this->message1 = $message1;
        $this->message2 = $message2;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject($this->budget->activity_code.'-'.$this->budget->boarder_activity. ' : Budget Item Approved')
                    ->line($this->message1)
                    ->line($this->message2)
                    ->action('Go To', url('/program/budget/'.$this->budget->id.'/edit'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'causer' => auth()->user()->name,
            'user_id' => auth()->user()->id,
            'message' => 'Budget Item Approved',
            'photo' =>auth()->user()->profile_photo_url,
            'url' => url('/program/budget/'.$this->budget->id.'/edit')
        ];
    }
}
