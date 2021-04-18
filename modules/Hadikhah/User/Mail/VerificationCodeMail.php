<?php

namespace Hadikhah\User\Mail;

use Hadikhah\User\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerificationCodeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var User
     */
    public $user;
    public $code;

    /**
     * Create a new message instance.
     *
     * @param User $user
     * @param $code
     */
    public function __construct(User $user, $code)
    {
        //
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
        return $this->markdown('View::mails.verify-mail')->subject('فعالسازی حساب کاربری');
    }
}
