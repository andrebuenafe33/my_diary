<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewDiaryEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $diary;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($diary)
    {
        $this->diary = $diary;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('admin.mails.new-diary')->subject($this->diary['trainee'].' is Requesting your Approval');
    }
}