<?php declare(strict_types=1);

namespace Tests\Unit\Traits\Validators;

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;
use Torugo\TString\Traits\Validators\TStringIsAlphanumeric;

#[TestDox('isAlphaNumeric() validator')]
class IsAlphanumericTest extends TestCase
{
    use TStringIsAlphanumeric;

    #[TestDox('Should return TRUE on alphanumeric characters')]
    public function testShouldReturnTrue()
    {
        $this->assertTrue($this->isAlphanumeric("abcdefghiklmnopqrstvxyzABCDEFGHIKLMNOPQRSTVXYZ0123456789"));
        $this->assertTrue($this->isAlphanumeric("twy5Z0V0lzhOItTa"));
        $this->assertTrue($this->isAlphanumeric("iZmáüàyÍsúL6DI00à0äúPÏvy", true));
        $this->assertTrue($this->isAlphanumeric("έτος2024", true));
        $this->assertTrue($this->isAlphanumeric("1983年は最高の年だ", true));
    }


    #[TestDox('Should return FALSE on non alphanumeric characters')]
    public function testShouldReturnFalse()
    {
        $this->assertFalse($this->isAlphanumeric("1983 was the best year"));
        $this->assertFalse($this->isAlphanumeric("13/03/1983"));
        $this->assertFalse($this->isAlphanumeric("έτος2024"));
        $this->assertFalse($this->isAlphanumeric("1983年は最高の年だ"));
    }
}
