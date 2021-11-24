<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RejectRecords extends Notification
{
    use Queueable;
    public $activity;
    public $reason;
    public $subject;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($activity, $reason, $subject)
    {
        $this->activity = $activity;
        $this->reason = $reason;
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
        return ['mail','database'];
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
                    ->line('Your Record is rejected by '.auth()->user()->name)
                    ->action('Notification Action', url('/'))
                    ->line('Reason for rejections - ',$this->reason);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'causer' => auth()->user()->name,
            'reason' => $this->reason,
            'subject' => $this->subject,
            'message' => 'Record is rejected ',
            'photo' =>auth()->user()->profile_photo_url,
            'url' => '/my-activities'
        ];
    }
}
