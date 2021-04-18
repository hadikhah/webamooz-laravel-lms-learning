<?php


namespace Hadikhah\User\Services;


class EmailVerificationCodeService
{
    public static function GenerateCode(): int
    {
        return random_int(100000, 999999);
    }

    public static function StoreCode($notifiable, $code): void
    {
        cache()->set('Verification_Code_' . $notifiable->id, $code, now()->addHour());
    }
}
