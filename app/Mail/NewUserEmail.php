<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewUserEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $inviteData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($inviteData)
    {
        $this->inviteData = $inviteData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('admin.mails.new-user')->subject('Welcome to CDL\'s Internship Duty Diary');
    }
}