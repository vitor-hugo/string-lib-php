<?php declare(strict_types=1);

namespace Tests\Unit\Traits\Validators;

use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;
use Torugo\TString\Traits\Validators\TStringMaxVersion;

#[TestDox('maxVersion() validator')]
class MaxVersionTest extends TestCase
{
    use TStringMaxVersion;

    #[TestDox('Should return TRUE on version number is lesser than maximum')]
    public function testShouldReturnTrueWhenVersionIsGreater()
    {
        //                                  v        v
        $this->assertTrue(self::maxVersion('1.0.0', '2.0.0'));

        //                                    v        v
        $this->assertTrue(self::maxVersion('8.3.0', '8.4.1'));

        //                                      v        v
        $this->assertTrue(self::maxVersion('3.0.2', '3.0.3'));

        $this->assertTrue(self::maxVersion('5.8', '6'));
        $this->assertTrue(self::maxVersion('1.0.0', '1.1'));
        $this->assertTrue(self::maxVersion('8', '9'));
        $this->assertTrue(self::maxVersion('10', '10.0'));
        $this->assertTrue(self::maxVersion('126.0.5980', '126.0.6478.63'));
    }


    #[TestDox('Should return TRUE on version number is equal to maximum')]
    public function testShouldReturnTrueWhenVersionIsEqual()
    {
        $this->assertTrue(self::maxVersion('2.0.0', '2.0.0'));
        $this->assertTrue(self::maxVersion('14.5', '14.5'));
        $this->assertTrue(self::maxVersion('5', '5'));
        $this->assertTrue(self::maxVersion('10.0', '10'));
        $this->assertTrue(self::maxVersion('126.0.6478.63', '126.0.6478.63'));
    }


    #[TestDox('Should return FALSE on versions that are greater than maximum')]
    public function testShouldReturnFalse()
    {
        //                                   v        v
        $this->assertFalse(self::maxVersion('8.0.0', '7.0.0'));

        //                                     v        v
        $this->assertFalse(self::maxVersion('2.2.0', '2.1.0'));

        //                                       v        v
        $this->assertFalse(self::maxVersion('1.0.3', '1.0.2'));

        $this->assertFalse(self::maxVersion('6', '5.8'));
        $this->assertFalse(self::maxVersion('9', '8'));
        $this->assertFalse(self::maxVersion('0.1.0', '0.0.1'));
        $this->assertFalse(self::maxVersion('126.0.6478.63', '126.0.5980'));
    }


    #[TestDox('Should return FALSE when version numbers have invalid characters')]
    public function testShouldReturnFalseOnInvalidCharacters()
    {
        $this->assertFalse(self::maxVersion('', '1.0.0'));
        $this->assertFalse(self::maxVersion('1.0.0', ''));
        $this->assertFalse(self::maxVersion('2.0.0-rc.1', '1.0.0'));
        $this->assertFalse(self::maxVersion('2.0.0', '1.0.0-rc.1'));
    }
}
