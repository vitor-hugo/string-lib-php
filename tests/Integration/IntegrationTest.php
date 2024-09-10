<?php declare(strict_types=1);

use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;
use Torugo\TString\TString;

#[Group("Integration")]
#[TestDox("Integration Tests")]
class IntegrationTest extends TestCase
{
    #[TestDox("Should be valid")]
    public function testShouldBeValid()
    {
        $this->assertTrue(TString::contains("xyz", "xyz"));
    }
}
