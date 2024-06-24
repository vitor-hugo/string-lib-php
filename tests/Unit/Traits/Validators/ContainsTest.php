<?php declare(strict_types=1);

namespace Tests\Unit\Traits\Validators;

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;
use Torugo\TString\Traits\Validators\TStringContains;

#[TestDox('contains() validator')]
class ContainsTest extends TestCase
{
    use TStringContains;

    private const TEXT = "The quick brown fox jumps over the lazy dog";

    #[TestDox('Should return TRUE when the needle is found in the haystack')]
    public function testShouldReturnTrue()
    {
        $this->assertTrue($this->contains(self::TEXT, "fox jumps over"));
        $this->assertTrue($this->contains(self::TEXT, " lazy "));
        $this->assertTrue($this->contains(self::TEXT, " dog"));

        $this->assertTrue($this->contains(self::TEXT, "BROWN", false)); // case insensitive
        $this->assertTrue($this->contains(self::TEXT, "The QUICK browN", false)); // case insensitive
    }


    #[TestDox('Should return FALSE when the needle is not found in the haystack')]
    public function testShouldReturnFalse()
    {
        $this->assertFalse($this->contains(self::TEXT, "sheep"));
        $this->assertFalse($this->contains(self::TEXT, "red fox"));
        $this->assertFalse($this->contains(self::TEXT, "QUICK", true)); // case sensitive
    }
}
