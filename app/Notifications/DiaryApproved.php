<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;

class DiaryApproved extends Notification
{
    use Queueable;

    public $diary;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($diary)
    {
        $this->diary = $diary;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['slack'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toSlack($notifiable)
    {
        $content = 'Hey ' . $this->diary['trainee'] . ', Congrats! Your duty diary has been approved by ' . $this->diary['supervisor'] . '. [' . $this->diary['url'] . ']';
        return (new SlackMessage)->content($content);
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
            //
        ];
    }
}