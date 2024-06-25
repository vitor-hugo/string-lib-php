<?php declare(strict_types=1);

namespace Tests\Unit\Traits\Handlers;

use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;
use Torugo\TString\Traits\Handlers\TStringToLowerCase;
use Torugo\TString\Traits\Handlers\TStringToTitleCase;
use Torugo\TString\Traits\Handlers\TStringToUpperCase;

#[Group('CaseHandlers')]
#[Group('toLowerCase')]
#[Group('toTitleCase()')]
#[Group('toUpperCase()')]
#[TestDox('toLowerCase(), toTitleCase() and toUpperCase() handlers')]
class CaseHandlersTest extends TestCase
{
    use TStringToLowerCase;
    use TStringToTitleCase;
    use TStringToUpperCase;

    #[TestDox("toLowerCase: Should transform correctly\n")]
    public function testShouldConvertToLowerCase()
    {
        $text = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $lower = $this->toLowerCase($text);
        $this->assertEquals('abcdefghijklmnopqrstuvwxyz', $lower);

        $text = 'ΑΝΆΠΤΥΞΗ';
        $lower = $this->toLowerCase($text);
        $this->assertEquals('ανάπτυξη', $lower);

        $text = 'ÃÁÀÂÄÇÉÊËÍÏÕÓÔÖÚÜ';
        $lower = $this->toLowerCase($text);
        $this->assertEquals('ãáàâäçéêëíïõóôöúü', $lower);
    }


    #[TestDox('toTitleCase: Should transform correctly with default options')]
    public function testShouldConvertToTitleCaseDefault()
    {
        $name = $this->toTitleCase("ALBERT EINSTEIN");
        $this->assertEquals("Albert Einstein", $name);

        $name = $this->toTitleCase("nikola tesla");
        $this->assertEquals("Nikola Tesla", $name);
    }


    #[TestDox('toTitleCase: Should transform fixing roman numerals')]
    public function testShouldConvertToTitleCaseFixRomanNumerals()
    {
        $name = $this->toTitleCase("pope benedict xvi", true, false);
        $this->assertEquals("Pope Benedict XVI", $name);
    }


    #[TestDox('toTitleCase: Should transform fixing portuguese prepositions')]
    public function testShouldConvertToTitleCaseFixPortPrep()
    {
        $name = $this->toTitleCase('NISE DA SILVEIRA', false, true);
        $this->assertEquals('Nise da Silveira', $name);

        $name = $this->toTitleCase('Tarsila Do Amaral', false, true);
        $this->assertEquals('Tarsila do Amaral', $name);
    }


    #[TestDox("toTitleCase: Should transform with all options enabled\n")]
    public function testShouldConvertToTitleCaseWithAllOptEnabled()
    {
        $name = $this->toTitleCase('XV DE PIRACICABA', true, true);
        $this->assertEquals('XV de Piracicaba', $name);
    }


    #[TestDox('toUppercase: Should transform correctly')]
    public function testShouldConvertToUpperCase()
    {
        $text = 'abcdefghijklmnopqrstuvwxyz';
        $lower = $this->toUpperCase($text);
        $this->assertEquals('ABCDEFGHIJKLMNOPQRSTUVWXYZ', $lower);

        $text = 'ανάπτυξη';
        $lower = $this->toUpperCase($text);
        $this->assertEquals('ΑΝΆΠΤΥΞΗ', $lower);

        $text = 'ãáàâäçéêëíïõóôöúü';
        $lower = $this->toUpperCase($text);
        $this->assertEquals('ÃÁÀÂÄÇÉÊËÍÏÕÓÔÖÚÜ', $lower);
    }
}
