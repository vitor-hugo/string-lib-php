<?php declare(strict_types=1);

namespace Tests\Unit\Traits\Validators;

use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;
use Torugo\TString\Traits\Validators\TStringIsEmail;

#[Group('isEmail')]
#[TestDox('isEmail() validator')]
class IsEmailTest extends TestCase
{
    use TStringIsEmail;

    #[TestDox('Should return TRUE on valid e-mails')]
    public function testShouldReturnTrue()
    {
        $valid = [
            'foo@bar.com',
            'x@x.au',
            'foo@bar.com.au',
            'foo+bar@bar.com',
            'hans.m端ller@test.com',
            'test123+ext@gmail.com',
            'some.name.midd.leNa.me.and.locality+extension@GoogleMail.com',
            '"foobar"@example.com',
            'test@gmail.com',
            'test.1@gmail.com',
            'test@1337.com',
        ];

        foreach ($valid as $email) {
            $this->assertTrue($this->isEmail($email));
        }
    }


    #[TestDox('Should return FALSE on invalid e-mails')]
    public function testShouldReturnFalse()
    {
        $invalid = [
            '',
            'hans@m端ller.com',
            'test|123@m端ller.com',
            'invalidemail@',
            'invalid.com',
            '@invalid.com',
            'foo@bar.com.',
            'foo@_bar.com',
            'somename@g m a i l.com',
            'foo@bar.co.uk.',
            'somename@ｇｍａｉｌ.com',
            'test1@invalid.co m',
            'test2@invalid.co m',
            'test3@invalid.co m',
            'test4@invalid.co m',
            'test5@invalid.co m',
            'test6@invalid.co m',
            'test7@invalid.co m',
            'test8@invalid.co m',
            'test9@invalid.co m',
            'test10@invalid.co m',
            'test11@invalid.co m',
            'test12@invalid.co　m',
            'test13@invalid.co　m',
            'multiple..dots@stillinvalid.com',
            'test123+invalid! sub_address@gmail.com',
            'gmail...ignores...dots...@gmail.com',
            'ends.with.dot.@gmail.com',
            'multiple..dots@gmail.com',
            'wrong()[]",:;<>@@gmail.com',
            '"wrong()[]",:;<>@@gmail.com',
            'username@domain.com�',
            'username@domain.com©',
            'nbsp test@test.com',
            'nbsp_test@te st.com',
            'nbsp_test@test.co m',
        ];

        foreach ($invalid as $email) {
            $this->assertFalse($this->isEmail($email));
        }
    }
}
