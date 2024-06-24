<?php declare(strict_types=1);

namespace Tests\Unit\Traits\Validators;

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;
use Torugo\TString\Traits\Validators\TStringIsCnpj;

/**
 * THE CNPJ NUMBERS IN THESE TESTS WERE GENERATED
 * RANDOMLY USING [THIS TOOL](https://www.4devs.com.br/gerador_de_cnpj).
 */
#[TestDox('isCnpj() validator')]
class IsCnpjTest extends TestCase
{
    use TStringIsCnpj;

    #[TestDox('Should return TRUE on valid CPNJ registry')]
    public function testShouldReturnTrueOnValidCnpjRegistry()
    {
        $this->assertTrue($this->isCnpj('99.453.669/0001-04'));
        $this->assertTrue($this->isCnpj('60391682000132'));
    }


    #[TestDox('Should return FALSE on invalid verification digit')]
    public function testShouldReturnFalseOnInvalidCnpjRegistry()
    {
        $this->assertFalse($this->isCnpj('99.453.669/0001-05'));
    }


    #[TestDox('Should return FALSE on invalid length')]
    public function testShouldReturnFalseOnLength()
    {
        $this->assertFalse($this->isCnpj('9953669000105'));
        $this->assertFalse($this->isCnpj('999.453.669/0001-04'));
    }


    #[TestDox("Should remove non numeric characters")]
    public function testShouldRemoveNonNumericCharacters()
    {
        $this->assertTrue($this->isCnpj('99 453 669 / 0001 (04)'));
    }
}
