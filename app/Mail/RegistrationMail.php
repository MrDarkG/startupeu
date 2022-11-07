<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrationMail extends Mailable
{
    use Queueable, SerializesModels;
    public User $user;
    /**
     * Create a new message instance.
     *
     * @return void
     * @param User $user
     * @param string $password
     */

    public function __construct(User $user, string $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.admin.userRegistration',[
            'email'=>$this->user->email,
            'password'=>$this->password,
        ]);
    }
}
