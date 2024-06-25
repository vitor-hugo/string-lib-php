<?php

declare(strict_types=1);

namespace Tests\Unit\Traits\Validators;

use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;
use Torugo\TString\Traits\Validators\TStringMinLength;

#[Group('minLength')]
#[TestDox('minLength() validator')]
class MinLengthTest extends TestCase
{
    use TStringMinLength;

    public function testShouldReturnTrueWhenLengthIsGreaterThanOrEqualToMin()
    {
        $this->assertTrue($this->minLength('kfRb7qhmdWear4X9', 15));
        $this->assertTrue($this->minLength('jCa3xMe9GZ82pmKu', 16));
    }


    public function testShouldReturnFalseWhenLengthIsLesserThanMin()
    {
        $this->assertFalse($this->minLength('afdvkxzeg9AwrB8D57XE3pj', 24));
    }


    public function testShouldFixMinParameterWhenItIsNegative()
    {
        $this->assertTrue($this->minLength('Y', -1));
    }
}
