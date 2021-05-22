<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class UserRegisteredEmail
 * @package App\Mail
 */
class UserRegisteredEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var User
     */
    public $user;


    /**
     * UserRegisteredEmail constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }


    /**
     * @return UserRegisteredEmail
     */
    public function build()
    {
        return $this
            ->subject('Conta Criada com Sucesso!')
            ->replyTo(config('mail.reply.address'))
            ->view('emails.user-registered');
    }
}
