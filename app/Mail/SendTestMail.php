<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendTestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $team)
    {
        $this->name = $name;
        $this->email = $email;
        $this->team = $team;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('Promo@info.com')
                    ->view('emails.test')
                    ->subject('招待メール')
                    ->with([
                        'name' => $this->name,
                        'email' => $this->email,
                        'team' => $this->team,
                    ]);
    }
}
