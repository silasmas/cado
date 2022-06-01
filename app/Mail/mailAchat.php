<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class mailAchat extends Mailable
{
    use Queueable, SerializesModels;
    public User $user;
    public $data=[];
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user,Array $data)
    {
        $this->user=$user;
        $this->data=$data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->data['objet'])->view('emails.achat');
    }
}
