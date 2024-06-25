<?php declare(strict_types=1);

namespace Tests\Unit\Traits\Handlers;

use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;
use Torugo\TString\Traits\Handlers\TStringToString;


/**
 * Have to create a stub class because of conflict with PHPUNit TestCase
 * that already has a method named 'toString'.
 */
class StubClass
{
    use TStringToString;

    public function __toString(): string
    {
        return 'From __toString method';
    }
}

#[Group('ToString')]
#[TestDox('toString() handler')]
class ToStringTest extends TestCase
{
    private StubClass $stub;

    public function setUp(): void
    {
        $this->stub = new StubClass;
    }


    public function testShouldConvertToStringCorrectly()
    {
        $testValues = [
            'This is a string, should do nothing',
            2017,
            3.1416,
            true,
            false,
            ['A', 'B', 'C', 1, 2, 3],
            $this->stub,
            null
        ];

        $expects = [
            'This is a string, should do nothing',
            '2017',
            '3.1416',
            'true',
            'false',
            'ABC123',
            'From __toString method',
            ''
        ];

        foreach ($testValues as $i => $value) {
            $result = $this->stub->toString($value);
            $this->assertEquals('string', gettype($result));
            $this->assertEquals($expects[$i], $result);
        }
    }


    public function testShouldReturnFalseWhenCantConvertTheValue()
    {
        $x = new \stdClass;
        $this->assertFalse($this->stub->toString($x));
    }


    public function testShouldPlaceArraySeparatorCorrectly()
    {
        $ip = [185, 85, 0, 29];
        $this->assertEquals('185.85.0.29', $this->stub->toString($ip, '.'));

        // $ipV6 = 'd89f:4652:d39b:1392:aae8:97b9:2778:39e2'
        $ipV6 = ['d89f', '4652', 'd39b', '1392', 'aae8', '97b9', '2778', '39e2'];
        $this->assertEquals('d89f:4652:d39b:1392:aae8:97b9:2778:39e2', $this->stub->toString($ipV6, ':'));

    }
}
