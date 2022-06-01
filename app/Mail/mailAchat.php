<?php

namespace App\Mail;

use App\Models\session;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class mailAchat extends Mailable
{
    use Queueable, SerializesModels;
    public User $user;
    public session $session;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, session $session)
    {
        $this->user=$user;
        $this->session=$session;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $d = $this->session->live == true && $this->session->isform == false ? "Réservation du live": "Achat de la Formation";

        return $this->markdown('emails.achat')->subject($d);
    }
}
