<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApprovedDiary extends Mailable
{
    use Queueable, SerializesModels;

    public $approvedDiary;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($approvedDiary)
    {
        $this->approvedDiary = $approvedDiary;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('admin.mails.approved-diary')->subject($this->approvedDiary['supervisor'].' has Approved your Duty Diary');
    }
}