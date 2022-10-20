<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\Team;

class SendTestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $team, $invite_url, $token)
    {
        $this->email = $email;
        $this->team = $team;
        $this->token = $token;
        $this->invite_url = $invite_url;
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
                        'email' => $this->email,
                        'team' => $this->team,
                        'token' => $this->token,
                        'invite_url' => $this->invite_url,
                    ]);
    }
}
