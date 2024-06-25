<?php

declare(strict_types=1);

namespace Tests\Unit\Traits\Validators;

use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;
use Torugo\TString\Traits\Validators\TStringIsLength;

#[Group('isLength')]
#[TestDox('isLength() validator')]
class IsLengthTest extends TestCase
{
    use TStringIsLength;

    public function testShouldReturnTrueOnValidLength()
    {
        $this->assertTrue($this->isLength('at`HW:({nyüpëFvbRLP8çCYGdVs~à6', 8, 64));
        $this->assertTrue($this->isLength('c8Z+ÀY^â6#?P=k}í', 16, 32));
        $this->assertTrue($this->isLength('qMrÉ{uô*Ëä8ZPn(í<ïÄw/ÊJÃHXÔ;Wd7ê', 16, 32));
    }


    public function testShouldReturnFalseOnInvalidLength()
    {
        $this->assertFalse($this->isLength('Eàa2()%VxÔrõ?h>', 16, 32));
        $this->assertFalse($this->isLength('rÁ95/ÕàãMhïnTäwCeYÜz`VZ;#4<2cRÖíÂ', 16, 32));
    }


    public function testShouldSwapMinAndMaxSizes()
    {
        $this->assertTrue($this->isLength('at`HW:({nyüpëFvbRLP8çCYGdVs~à6', 64, 8));
        $this->assertTrue($this->isLength('c8Z+ÀY^â6#?P=k}í', 32, 16));
        $this->assertTrue($this->isLength('qMrÉ{uô*Ëä8ZPn(í<ïÄw/ÊJÃHXÔ;Wd7ê', 32, 16));
    }


    public function testShouldFixNegativeParameters()
    {
        $this->assertTrue($this->isLength('1', -1, -1)); // 0, 1
        $this->assertTrue($this->isLength('1234567890', 10, -1)); // 10, 1 -> then swap 1, 10
        $this->assertFalse($this->isLength('', 10, -1)); // 10, 1 -> then swap 1, 10
    }
}
