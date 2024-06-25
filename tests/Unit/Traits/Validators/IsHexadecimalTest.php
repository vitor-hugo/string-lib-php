<?php

declare(strict_types=1);

namespace Tests\Unit\Traits\Validators;

use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;
use Torugo\TString\Traits\Validators\TStringIsHexadecimal;

#[Group('isHexadecimal')]
#[TestDox('isHexadecimal() validator')]
class IsHexadecimalTest extends TestCase
{
    use TStringIsHexadecimal;

    public function testShouldReturnTrueOnHexadecimalStrings()
    {
        $this->assertTrue($this->isHexadecimal('c0627d4e8eae2e8e584d'));
        $this->assertTrue($this->isHexadecimal('1D5D98'));
        $this->assertTrue($this->isHexadecimal('0x4041E2F71BA5'));
        $this->assertTrue($this->isHexadecimal('0x15e1aea12b49'));
    }


    public function testShouldReturnFalseOnNonHexadecimalStrings()
    {
        $this->assertFalse($this->isHexadecimal('i0qh9o2pfm'));
        $this->assertFalse($this->isHexadecimal('#4EFCB7'));
        $this->assertFalse($this->isHexadecimal(' 4EFCB7 '));
        $this->assertFalse($this->isHexadecimal(''));
    }
}
