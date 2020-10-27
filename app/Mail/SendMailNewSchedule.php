<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailNewSchedule extends Mailable
{
    use Queueable, SerializesModels;
    private $schedule;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($schedule)
    {
        $this->schedule = $schedule;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $emails = $this->schedule->participants->map(function($p){ return $p->user->email;});
        return $this->to($emails)
            ->subject('Novo Compromisso: ' . $this->schedule->subject)
            ->view('mail.new-schedule');
    }
}
