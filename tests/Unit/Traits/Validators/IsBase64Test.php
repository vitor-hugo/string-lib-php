<?php declare(strict_types=1);

namespace Tests\Unit\Traits\Validators;

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;
use Torugo\TString\Traits\Validators\TStringIsBase64;

#[TestDox('isBase64() validator')]
class IsBase64Test extends TestCase
{
    use TStringIsBase64;

    #[TestDox('Should return TRUE on valid Base64 strings')]
    public function testShouldReturnTrueOnValidB64String()
    {
        $this->assertTrue($this->isBase64('THVrZSBJIGFtIHlvdXIgZmF0aGVyIQ=='));
    }


    #[TestDox('Should return TRUE on valid url safe Base64 strings')]
    public function testShouldReturnTrueOnUrlSafeB64()
    {
        $this->assertTrue($this->isBase64('V2h5IHNvIHNlcmlvdXM/'));
    }


    #[TestDox('Should return FALSE on non Base64 strings')]
    public function testShouldReturnFalse()
    {
        $this->assertFalse($this->isBase64('not a base 64'));
        $this->assertFalse($this->isBase64('VGhp/cy=BpcyBhIHRlc3Q'));
    }
}
