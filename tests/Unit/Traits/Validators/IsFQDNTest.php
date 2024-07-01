<?php declare(strict_types=1);

namespace Tests\Unit\Traits\Validators;

use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;
use Torugo\TString\Traits\Validators\TStringIsFQDN;

#[Group('isFQDN')]
#[Group('isUrl')]
#[TestDox('isFQDN() validator')]
class IsFQDNTest extends TestCase
{
    use TStringIsFQDN;

    #[TestDox('Should return TRUE on valid FQDN')]
    public function testShouldReturnTrue()
    {
        $valid = [
            'domain.com',
            'dom.plato',
            'a.domain.co',
            'foo--bar.com',
            'xn--froschgrn-x9a.com',
            'rebecca.blackfriday',
            '1337.com',
        ];

        foreach ($valid as $str) {
            $this->assertTrue($this->isFQDN($str));
        }
    }


    #[TestDox('Should return FALSE on invalid FQDN')]
    public function testShouldReturnFalse()
    {
        $invalid = [
            'abc',
            '256.0.0.0',
            '_.com',
            '*.some.com',
            's!ome.com',
            'domain.com/',
            '/more.com',
            'domain.com�',
            'domain.co\u00A0m',
            'domain.co\u1680m',
            'domain.co\u2006m',
            'domain.co\u2028m',
            'domain.co\u2029m',
            'domain.co\u202Fm',
            'domain.co\u205Fm',
            'domain.co\u3000m',
            'domain.com\uDC00',
            'domain.co\uEFFFm',
            'domain.co\uFDDAm',
            'domain.co\uFFF4m',
            'domain.com©',
            'example.0',
            '192.168.0.9999',
            '192.168.0',
        ];

        foreach ($invalid as $str) {
            if ($this->isFQDN($str) === true) {
                exit(PHP_EOL . $str . PHP_EOL);
            }

            $this->assertFalse($this->isFQDN($str));
        }
    }
}
