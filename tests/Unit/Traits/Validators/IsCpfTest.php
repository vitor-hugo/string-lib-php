<?php declare(strict_types=1);

namespace Tests\Unit\Traits\Validators;

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;
use Torugo\TString\Traits\Validators\TStringIsCpf;

/**
 * THE CPF NUMBERS IN TESTS WERE GENERATED RANDOMLY
 * USING [THIS TOOL](https://www.4devs.com.br/gerador_de_cpf).
 */
#[TestDox('isCpf() validator')]
class IsCpfTest extends TestCase
{
    use TStringIsCpf;

    #[TestDox('Should return TRUE on valid CPF registry')]
    public function testShouldReturnTrueOnValidCnpjRegistry()
    {
        $this->assertTrue($this->isCpf('88479747048'));
        $this->assertTrue($this->isCpf('532.625.750-54'));
    }


    #[TestDox('Should return FALSE on invalid verification digit')]
    public function testShouldReturnFalseOnInvalidCnpjRegistry()
    {
        $this->assertFalse($this->isCpf('532.625.750-55'));
    }


    #[TestDox('Should return FALSE on invalid length')]
    public function testShouldReturnFalseOnLength()
    {
        $this->assertFalse($this->isCpf('53.625.750-54'));
        $this->assertFalse($this->isCpf('532.625.750-541'));
    }


    #[TestDox("Should remove non numeric characters")]
    public function testShouldRemoveNonNumericCharacters()
    {
        $this->assertTrue($this->isCpf('532 625 750 (54)'));
    }
}
