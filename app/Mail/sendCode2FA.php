<?php

namespace App\Mail;

use App\Models\User;
use App\Models\User2FACode;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendCode2FA extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    private $code;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, User2FACode $code)
    {
        $this->user = $user;
        $this->code = $code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Seu código de verificação de login do '. config('app.name'));
        $this->to($this->user->email, $this->user->name);

        return $this->markdown('mail.2fa-code', [
            'user' => $this->user,
            'code' => $this->code,
        ]);
    }
}
