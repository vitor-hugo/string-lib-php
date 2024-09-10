<?php declare(strict_types=1);

namespace Torugo\TString\Traits\Validators;

trait TStringIsCpf
{

    /**
     * Validates if a property has a valid CPF identification.
     *
     * CPF Stands for “Cadastro de Pessoas Físicas” or “Registry of Individuals”.
     * It is similar to the “Social Security” number adopted in the US, and it is used as a type
     * of universal identifier in Brazil.
     *
     * This validator uses a validator code from [Rafael Neri](https://gist.github.com/rafael-neri/ab3e58803a08cb4def059fce4e3c0e40)
     *
     * @param string $cpf CPF ID
     * @return bool
     */
    public static function isCpf(string $cpf): bool
    {
        $cpf = preg_replace('/[^0-9]/is', '', $cpf);

        if (strlen($cpf) != 11) {
            return false;
        }

        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        return self::cpfVerificationDigitIsValid($cpf);
    }


    private static function cpfVerificationDigitIsValid(string $cpf): bool
    {
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }

        return true;
    }
}
