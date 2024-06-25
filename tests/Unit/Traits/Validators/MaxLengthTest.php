<?php

declare(strict_types=1);

namespace Tests\Unit\Traits\Validators;

use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;
use Torugo\TString\Traits\Validators\TStringMaxLength;

#[Group('maxLength')]
#[TestDox('maxLength() validator')]
class MaxLengthTest extends TestCase
{
    use TStringMaxLength;

    public function testShouldReturnTrueWhenLengthIsLesserThanOrEqualToMax()
    {
        $this->assertTrue($this->maxLength('pSqKDfErCG5zTkmh', 18));
        $this->assertTrue($this->maxLength('cETíÁ4ÃR9k=Hj7óGÜt@8', 20));
    }


    public function testShouldReturnFalseWhenLengthIsGreaterThanMax()
    {
        $this->assertFalse($this->maxLength('WNEybhJQ4rgAMkRpjTLV2q65r', 24));
    }


    public function testShouldFixMaxParameterWhenItIsLesserThanOrEqualToZero()
    {
        $this->assertTrue($this->maxLength('X', 0));
        $this->assertTrue($this->maxLength('Y', -1));
    }
}
