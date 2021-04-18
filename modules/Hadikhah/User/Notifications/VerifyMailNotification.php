<?php

namespace Hadikhah\User\Notifications;

use Hadikhah\User\Mail\VerificationCodeMail;
use Hadikhah\User\Services\EmailVerificationCodeService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VerifyMailNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return VerificationCodeMail
     */
    public function toMail($notifiable)
    {
        /*
         * generating verification code and save it to cache
         * and send to it to user via
         * verification code mail notification
         */
        $code = EmailVerificationCodeService::GenerateCode();
        EmailVerificationCodeService::StoreCode($notifiable, $code);
        return (new VerificationCodeMail($notifiable, $code))->to($notifiable->email);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
