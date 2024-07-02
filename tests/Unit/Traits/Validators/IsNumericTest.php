<?php declare(strict_types=1);

namespace Tests\Unit\Traits\Validators;

use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;
use Torugo\TString\Traits\Validators\TStringIsNumeric;

#[Group('isNumeric')]
#[TestDox('isNumeric() validator')]
class IsNumericTest extends TestCase
{
    use TStringIsNumeric;

    #[TestDox('Should return TRUE on valid numeric strings')]
    public function testShouldReturnTrueOnValidNumericStrings()
    {
        $this->assertTrue($this->isNumeric('477303685426564879185680129761'));
        $this->assertTrue($this->isNumeric('1983'));
        $this->assertTrue($this->isNumeric('-45'));
    }


    #[TestDox('Should return TRUE when $includePonctuation argument enabled')]
    public function testShouldReturnTrueOnValidPonctuation()
    {
        $this->assertTrue($this->isNumeric('3.1415', true));
        $this->assertTrue($this->isNumeric('534,763,185.78', true));
    }


    #[TestDox('Should return FALSE when $includePonctuation argument disabled')]
    public function testShouldReturnTrueOnInvalidPonctuation()
    {
        $this->assertFalse($this->isNumeric('534,763,185.78', false));
    }


    #[TestDox('Should return FALSE on non numeric strings')]
    public function testShouldReturnFalseOnNonNumericStrings()
    {
        $this->assertFalse($this->isNumeric('123-456'));
        $this->assertFalse($this->isNumeric('199O'));
        $this->assertFalse($this->isNumeric('USD 9.99', true));
    }
}
