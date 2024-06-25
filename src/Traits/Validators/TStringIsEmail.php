<?php declare(strict_types=1);

namespace Torugo\TString\Traits\Validators;

trait TStringIsEmail
{
    /**
     * Validates if a string has a valid email structure.
     *
     * @param string $email E-mail string to be validated.
     * @return bool
     */
    public static function isEmail(string $email): bool
    {
        $validation = filter_var($email, FILTER_VALIDATE_EMAIL, FILTER_FLAG_EMAIL_UNICODE);
        return $validation !== false;
    }
}
