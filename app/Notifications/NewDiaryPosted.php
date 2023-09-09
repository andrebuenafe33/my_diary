<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;

class NewDiaryPosted extends Notification
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
        $content = $this->diary['trainee'] . ' has posted a duty diary and assigned to supervisor ' . $this->diary['supervisor'] . ' for Approval. [' . $this->diary['url'] . ']';
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