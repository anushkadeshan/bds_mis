<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;

class ApproveRecords extends Notification
{
    use Queueable;
    public $activity;
    public $subject;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($activity, $subject)
    {
        $this->activity = $activity;
        $this->subject = $subject;
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
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
            'message' => 'Record is approved',
            'photo' =>auth()->user()->profile_photo_url,
            'url' => '/my-activities'
        ];
    }

    public function broadcastType()
    {
        return 'broadcast.message';
    }
}
