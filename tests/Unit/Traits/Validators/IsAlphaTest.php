<?php declare(strict_types=1);

namespace Tests\Unit\Traits\Validators;

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;
use Torugo\TString\Traits\Validators\TStringIsAlpha;

#[TestDox('isAlpha() validator')]
class IsAlphaTest extends TestCase
{
    use TStringIsAlpha;

    #[TestDox('Should return TRUE on alphabetical characters')]
    public function testShouldReturnTrue()
    {
        $this->assertTrue($this->isAlpha("abcdefghiklmnopqrstvxyzABCDEFGHIKLMNOPQRSTVXYZ"));
        $this->assertTrue($this->isAlpha("ãáàâäçéêëíïõóôöúüÃÁÀÂÄÇÉÊËÍÏÕÓÔÖÚÜ", true));
        $this->assertTrue($this->isAlpha("発達", true));
        $this->assertTrue($this->isAlpha("ανάπτυξη", true));
    }


    #[TestDox('Should return FALSE on non alphabetical characters')]
    public function testShouldReturnFalse()
    {
        $this->assertFalse($this->isAlpha("Some text"));
        $this->assertFalse($this->isAlpha("ãáàâäçéêëíïõóôöúüÃÁÀÂÄÇÉÊËÍÏÕÓÔÖÚÜ"));
        $this->assertFalse($this->isAlpha("지능"));
        $this->assertFalse($this->isAlpha("upplýsingaöflun"));
    }
}
