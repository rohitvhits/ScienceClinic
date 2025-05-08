<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminHourlyRateNotification extends Notification
{
    use Queueable;
    private $details;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
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
    public function toArray($notifiable)
    {
        $userName = '';
        $subjectName = '';
        $parentId = '';
        $type = '';
        if(isset($this->details['username'])){
            $userName = $this->details['username'];
        }
        if(isset($this->details['subjectname'])){
            $subjectName = $this->details['subjectname'];
        }
        if(isset($this->details['type'])){
            $type = $this->details['type'];
        }
        if(isset($this->details['parentid'])){
            $parentId = $this->details['parentid'];
        }
        return [
            'body' => $this->details['body'],
            'username'=> $userName,
            'subjectname'=> $subjectName,
            'parentid'=>$parentId,
            'type'=> $type
        ];
    }
}
