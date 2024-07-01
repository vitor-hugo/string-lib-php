<?php declare(strict_types=1);

namespace Tests\Unit\Traits\Validators;

use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;
use Torugo\TString\Traits\Validators\TStringIsIP;

#[Group('isIP')]
#[Group('isUrl')]
#[TestDox('isIP() validator')]
class IsIPTest extends TestCase
{
    use TStringIsIP;

    #[TestDox('Should return TRUE on valid IP')]
    public function testShouldReturnTrue()
    {
        $valid = [
            '127.0.0.1',
            '0.0.0.0',
            '255.255.255.255',
            '1.2.3.4',
            '::1',
            '2001:db8:0000:1:1:1:1:1',
            '2001:db8:3:4::192.0.2.33',
            '2001:41d0:2:a141::1',
            '::ffff:127.0.0.1',
            '::0000',
            '0000::',
            '1::',
            '1111:1:1:1:1:1:1:1',
            'fe80::a6db:30ff:fe98:e946',
            '::',
            '::8',
            '::ffff:127.0.0.1',
            '::ffff:255.255.255.255',
            '::ffff:0:255.255.255.255',
            '::2:3:4:5:6:7:8',
            '::255.255.255.255',
            '0:0:0:0:0:ffff:127.0.0.1',
            '1:2:3:4:5:6:7::',
            '1:2:3:4:5:6::8',
            '1::7:8',
            '1:2:3:4:5::7:8',
            '1:2:3:4:5::8',
            '1::6:7:8',
            '1:2:3:4::6:7:8',
            '1:2:3:4::8',
            '1::5:6:7:8',
            '1:2:3::5:6:7:8',
            '1:2:3::8',
            '1::4:5:6:7:8',
            '1:2::4:5:6:7:8',
            '1:2::8',
            '1::3:4:5:6:7:8',
            '1::8',
            'fe80::7:8%eth0',
            'fe80::7:8%1',
            '64:ff9b::192.0.2.33',
            '0:0:0:0:0:0:10.0.0.1',
        ];

        foreach ($valid as $ip) {
            $this->assertTrue($this->isIP($ip));
        }
    }


    #[TestDox('Should return FALSE on invalid IP')]
    public function testShouldReturnFalse()
    {
        $invalid = [
            'abc',
            '256.0.0.0',
            '0.0.0.256',
            '26.0.0.256',
            '0200.200.200.200',
            '200.0200.200.200',
            '200.200.0200.200',
            '200.200.200.0200',
            '::banana',
            'banana::',
            '::1banana',
            '::1::',
            '1:',
            ':1',
            ':1:1:1::2',
            '1:1:1:1:1:1:1:1:1:1:1:1:1:1:1:1',
            '::11111',
            '11111:1:1:1:1:1:1:1',
            '2001:db8:0000:1:1:1:1::1',
            '0:0:0:0:0:0:ffff:127.0.0.1',
            '0:0:0:0:ffff:127.0.0.1',
        ];

        foreach ($invalid as $ip) {
            $this->assertFalse($this->isIP($ip));
        }
    }
}
