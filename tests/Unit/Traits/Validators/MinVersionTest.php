<?php declare(strict_types=1);

namespace Tests\Unit\Traits\Validators;

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;
use Torugo\TString\Traits\Validators\TStringMinVersion;

#[TestDox('MinVersion validator')]
class MinVersionTest extends TestCase
{
    use TStringMinVersion;

    #[TestDox('Should return TRUE on version number is greater than required')]
    public function testShouldReturnTrueWhenVersionIsGreater()
    {
        //                                  v        v
        $this->assertTrue(self::minVersion('2.0.0', '1.0.0'));

        //                                    v        v
        $this->assertTrue(self::minVersion('8.4.0', '8.3.8'));

        //                                      v        v
        $this->assertTrue(self::minVersion('3.0.3', '3.0.2'));

        $this->assertTrue(self::minVersion('6', '5.8'));
        $this->assertTrue(self::minVersion('1.1', '1.0.0'));
        $this->assertTrue(self::minVersion('9', '8'));
        $this->assertTrue(self::minVersion('10.0', '10'));
        $this->assertTrue(self::minVersion('126.0.6478.63', '126.0.5980'));
    }


    #[TestDox('Should return TRUE on version number is equal to required')]
    public function testShouldReturnTrueWhenVersionIsEqual()
    {
        $this->assertTrue(self::minVersion('2.0.0', '2.0.0'));
        $this->assertTrue(self::minVersion('14.5', '14.5'));
        $this->assertTrue(self::minVersion('5', '5'));
        $this->assertTrue(self::minVersion('126.0.6478.63', '126.0.6478.63'));
    }


    #[TestDox('Should return FALSE on versions that lesser than required')]
    public function testShouldReturnFalse()
    {
        //                                   v        v
        $this->assertFalse(self::minVersion('7.9.2', '8.0.0'));

        //                                     v        v
        $this->assertFalse(self::minVersion('2.4.2', '2.5.0'));

        //                                       v        v
        $this->assertFalse(self::minVersion('1.0.2', '1.0.3'));

        $this->assertFalse(self::minVersion('5.8', '6'));
        $this->assertFalse(self::minVersion('1.0.0', '1.1'));
        $this->assertFalse(self::minVersion('8', '9'));
        $this->assertFalse(self::minVersion('10', '10.1'));
        $this->assertFalse(self::minVersion('126.0.5980', '126.0.6478.63'));
    }


    #[TestDox('Should return FALSE when version numbers have invalid characters')]
    public function testShouldReturnFalseOnInvalidCharacters()
    {
        $this->assertFalse(self::minVersion('', '1.0.0'));
        $this->assertFalse(self::minVersion('1.0.0', ''));
        $this->assertFalse(self::minVersion('2.0.0-rc.1', '2.0.0'));
        $this->assertFalse(self::minVersion('2.0.0', '2.0.0-rc.1'));
    }
}
