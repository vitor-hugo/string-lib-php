<?php declare(strict_types=1);

namespace Torugo\TString\Traits\Validators;

trait TStringIsCnpj
{

    /**
     * Validates if a property has a valid CNPJ registration.
     *
     * The Brazil National Registry of Legal Entities number (CNPJ) is a company identification number
     * that must be obtained from the Department of Federal Revenue(Secretaria da Receita Federal do Brasil)
     * prior to the start of any business activities.
     *
     * This validator uses a validator code from [Guilherme Sehn](https://gist.github.com/guisehn/3276302)
     *
     * @param string $cnpj CNPJ registration number
     * @return bool
     */
    public static function isCnpj(string $cnpj): bool
    {
        $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);

        if (strlen($cnpj) != 14) {
            return false;
        }

        if (preg_match('/(\d)\1{13}/', $cnpj)) {
            return false;
        }

        return self::cnpjVerificationDigitIsValid($cnpj);
    }


    private static function cnpjVerificationDigitIsValid(string $cnpj): bool
    {
        // Validates first verification digit
        for ($i = 0, $j = 5, $sum = 0; $i < 12; $i++) {
            $sum += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $remainder = $sum % 11;

        if ($cnpj[12] != ($remainder < 2 ? 0 : 11 - $remainder)) {
            return false;
        }

        // Validates second verification digit
        for ($i = 0, $j = 6, $sum = 0; $i < 13; $i++) {
            $sum += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $remainder = $sum % 11;

        return $cnpj[13] == ($remainder < 2 ? 0 : 11 - $remainder);
    }
}
