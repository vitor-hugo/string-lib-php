> [!NOTE]
> THIS PACKAGE IS UNDER DEVELOPMENT.

# TString <!-- omit in toc -->

Small toolset for validating and manipulating strings

# Table of Contents <!-- omit in toc -->

- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
  - [Via Traits](#via-traits)
  - [Via TString object](#via-tstring-object)
- [Validators](#validators)
  - [contains](#contains)
  - [isAlpha](#isalpha)
  - [isAlphanumeric](#isalphanumeric)
  - [isBase64](#isbase64)
  - [isCnpj](#iscnpj)
  - [isCpf](#iscpf)
  - [isLength](#islength)
  - [isNumeric](#isnumeric)
  - [matchRegex](#matchregex)
  - [maxLength](#maxlength)
  - [minLength](#minlength)
  - [maxVersion](#maxversion)
  - [minVersion](#minversion)
- [Manipulators](#manipulators)
  - [append](#append)
  - [capitalize](#capitalize)
  - [prepend](#prepend)
  - [replace](#replace)
  - [toLowercase](#tolowercase)
  - [toUppercase](#touppercase)
- [Contribute](#contribute)
- [License](#license)


# Requirements

- PHP 8+
- PHP [mbstring extension](https://www.php.net/manual/en/mbstring.installation.php) installed and loaded.
- Composer 2+


# Installation

```shell
composer require torugo/tstring
```

<!-- MARK: Usage -->

# Usage

You can use this library in two ways, using specific **Traits** or **instantiating the TString** class.

## Via Traits

Traits are a good way to use only the functions you need, just use them within your classes.

> [!NOTE]
> All valitors and manipulators traits functions visibility are `public static`.

```php
use Torugo\TString\Traits\Validators\TStringContains;

class MyClass()
{
    use TStringContains;

    public function myValidation() {
        // ...
        if (self::contains($haystack, $needle, false)) {
            // Do something...
        }
        // ...
    }
}
```


## Via TString object

TString class is the easiest way to use the functions of this library, by using it you will have
access to all features in a single object.

```php
use Torugo\TString\TString;

if  (TString::contains($haystack, $needle, false)) {
    // Do something
}
```

<!-- MARK: Validators -->

# Validators

## contains

Checks if a substring is contained in another string.

```php
contains(string $haystack, string $needle, bool $caseSensitive = true): bool
```
> [!NOTE]
> By default the case sensitiveness is enabled.

<h3>Trait Namespace</h3>

```php
use Torugo\TString\Traits\Validators\TStringContains;
```

<h3>Examples</h3>

```php
$text = 'The quick brown fox jumps over the lazy dog';

contains($text, 'fox jumps'); // returns true
contains($text, 'OVER', false); // returns true, case insensitive

contains($text, 'red fox'); // returns false
contains($text, 'LAZY DOG'); // returns false, case sensitive
```

## isAlpha

Validates if a string have only alphabetical characters.

```php
isAlpha(string $str, bool $includeUnicode = false): bool
```

> [!NOTE]
> When enabled, the argument **`$includeUnicode`** will include some unicode alphabetic characters
> like accented letters, and alphabetical characters from some languages.
> This option is disabled by default.

<h3>Trait Namespace</h3>

```php
use Torugo\TString\Traits\Validators\TStringIsAlpha;
```

<h3>Examples</h3>

```php
isAlpha("abcdefghiklmnopqrstvxyzABCDEFGHIKLMNOPQRSTVXYZ"); // returns true
isAlpha("ãáàâäçéêëíïõóôöúüÃÁÀÂÄÇÉÊËÍÏÕÓÔÖÚÜ", true); // returns true (unicode enabled)
isAlpha("ανάπτυξη", true); // returns true (unicode enabled)
isAlpha("発達", true); // returns true (unicode enabled)

isAlpha("Some text"); // returns false (no spaces)
isAlpha("ãáàâäçéêëíïõóôöúüÃÁÀÂÄÇÉÊËÍÏÕÓÔÖÚÜ"); // returns false (unicode disabled)
isAlpha("지능"); // returns false (unicode disabled)
isAlpha("upplýsingaöflun"); // returns false (unicode disabled)
```

## isAlphanumeric

Validates if a string have only alphanumeric characters.

```php
isAlphanumeric(string $str, bool $includeUnicode = false): bool
```

> [!NOTE]
> When enabled, the argument **`$includeUnicode`** will include some unicode alphabetic characters
> like accented letters, and alphabetical characters from some languages.
> This option is disabled by default.

<h3>Trait Namespace</h3>

```php
use Torugo\TString\Traits\Validators\TStringIsAlphanumeric;
```

<h3>Examples</h3>

```php
isAlphanumeric("abcdefghiklmnopqrstvxyzABCDEFGHIKLMNOPQRSTVXYZ0123456789"); // returns true
isAlphanumeric("twy5Z0V0lzhOItTa"); // returns true
isAlphanumeric("iZmáüàyÍsúL6DI00à0äúPÏvy", true); // returns true (unicode enabled)
isAlphanumeric("έτος2024", true); // returns true (unicode enabled)
isAlphanumeric("1983年は最高の年だ", true); // returns true (unicode enabled)

isAlphanumeric("march 1983"); // returns false
isAlphanumeric("13/03/1983"); // returns false
isAlphanumeric("έτος2024"); // returns false (unicode disabled)
isAlphanumeric("1983年は最高の年だ"); // returns false (unicode disabled)
```

## isBase64

Validates whether a string is in Base64 format.  
Also validates url safe Base64 strings.

```php
protected static function isBase64(string $base64): bool;
```

<h3>Trait Namespace</h3>

```php
use Torugo\TString\Traits\Validators\TStringIsBase64;
```

<h3>Examples</h3>

```php
isBase64('THVrZSBJIGFtIHlvdXIgZmF0aGVyIQ=='); // returns true
isBase64('V2h5IHNvIHNlcmlvdXM/'); // returns true (url safe)
isBase64('VGhp/cy=BpcyBhIHRlc3Q'); // returns false
```

## isCnpj

Validates if a given string has a valid CNPJ registration.

The Brazil National Registry of Legal Entities number (CNPJ) is a company identification number
that must be obtained from the Department of Federal Revenue(Secretaria da Receita Federal do Brasil)
prior to the start of any business activities.

```php
protected static function isCnpj(string $cnpj): bool
```

<h3>Trait Namespace</h3>

```php
use Torugo\TString\Traits\Validators\TStringIsCnpj;
```

<h3>Examples</h3>

```php
isCnpj('60391682000132'); // returns true
isCnpj('99.453.669/0001-04'); // returns true, this is the default format
isCnpj('99 453 669 / 0001 (04)'); // returns true, it removes non numerical characters

isCnpj('99.453.669/0001-05'); // returns false, invalid verification digit
isCnpj('9953669000105'); // returns false, invalid length
isCnpj('999.453.669/0001-04'); // returns false, invalid length
```

> [!NOTE]
> This validator uses a validation code from [Guilherme Sehn](https://gist.github.com/guisehn/3276302).

> [!IMPORTANT]
> The cnpj numbers above were generated randomly using [this tool](https://www.4devs.com.br/gerador_de_cnpj).  
> If one of them belongs to you, please send me a request to remove.

## isCpf

Validates if a given string has a valid CPF identification.

CPF Stands for “Cadastro de Pessoas Físicas” or “Registry of Individuals”.
It is similar to the “Social Security” number adopted in the US, and it is used as a type
of universal identifier in Brazil.

```php
protected static function isCpf(string $cpf): bool
```

<h3>Trait Namespace</h3>

```php
use Torugo\TString\Traits\Validators\TStringIsCpf;
```

<h3>Examples</h3>

```php
isCpf('88479747048'); // returns true
isCpf('532.625.750-54'); // returns true, this is the default format
isCpf('532 625 750 (54)'); // returns true, removes non numerical characters

isCpf('532.625.750-55'); // returns false, invalid verification digit
isCpf('53.625.750-54'); // returns false, invalid length
isCpf('532.625.750-541'); // returns false, invalid length
```

> [!NOTE]
> This validator uses a validation code from
> [Rafael Neri](https://gist.github.com/rafael-neri/ab3e58803a08cb4def059fce4e3c0e40).

> [!IMPORTANT]
> The CPF numbers above were generated randomly using [this tool](https://www.4devs.com.br/gerador_de_cpf).  
> If one of them belongs to you, please send me a request and I will remove it immediately.

## isLength

Validates if the length of a string is between the minimum and maximum parameters.

```php
protected function isLength(string $str, int $min, int $max): bool
```

> [!IMPORTANT]
> If `$min` is negative it will be setted to `0` (zero).  
> If `$max` is lesser than `1` it will be setted to `1`.  
> If `$min` is lesser than `$max`, their values will be swapped.  

<h3>Trait Namespace</h3>

```php
use Torugo\TString\Traits\Validators\TStringIsNumeric;
```

<h3>Examples</h3>

```php
isLength('MySuperStrongPassword!', 8, 64); // returns true
isLength('yágftÔúÍézÏP5mÕ3(8G}KQÖÜ', 24, 26); // returns true

isLength('fZ?ávãYów3j);ÜMK7!:k', 10, 20); // returns false, exceeded maximum length
isLength('xRh8É<', 8, 16); // returns false, did not reach the minimum length
```

## isNumeric

Validates if a string have only numeric characters.

```php
public static function isNumeric(string $str, bool $includePonctuation = false): bool
```

<h3>Trait Namespace</h3>

```php
use Torugo\TString\Traits\Validators\TStringIsNumeric;
```

<h3>Examples</h3>

```php
isNumeric('100'); // returns true
isNumeric('-15'); // returns true 
isNumeric('3.1415', true); // returns true, ponctuation enabled
isNumeric('1,999.99', true); // returns true, ponctuation enabled

isNumeric('3.1415'); // returns false, ponctuation disabled
isNumeric('R$ 999,99', true); // returns false, invalid characters
isNumeric('2.2.0', true); // returns false
```

## matchRegex
> Under development

## maxLength

Validates if the length of a string is lesser than or equal to a maximum parameter.

```php
protected function minLength(string $str, int $min): bool
```

> [!IMPORTANT]
> If `$min` is negative it will be setted to `0` (zero).  
> If `$max` is lesser than `1` it will be setted to `1`.  
> If `$min` is lesser than `$max`, their values will be swapped.  

<h3>Trait Namespace</h3>

```php
use Torugo\TString\Traits\Validators\TStringMaxLength;
```

<h3>Examples</h3>

```php
maxLength('pSqKDfErCG5zTkmh', 18); // returns true
maxLength('cETíÁ4ÃR9k=Hj7óGÜt@8', 20); // returns true

maxLength('DXaE', 5); // returns false

maxLength('X', 0); // sets max parameter to 1 and returns true
maxLength('Y', -1); // sets max parameter to 1 and returns true
```

## minLength
> Under development

## maxVersion

Checks if a version number is lesser or equal to a given one.

This function validates version numbers that have only numbers sepatared by periods.  
- Valid: '8.3.8', '5.0', '3.22.2', '10', '126.0.6478.63' ...
- Invalid: '2.0.0-rc.1', '1.0.0-beta' ...
  
```php
maxVersion(string $version, string $maxVersion): bool
```

<h3>Trait Namespace</h3>

```php
use Torugo\TString\Traits\Validators\TStringMaxVersion;
```

<h3>Examples</h3>

```php
maxVersion('1.0.0', '1.0.1') // returns true
maxVersion('2.0.0', '2.1') // returns true
maxVersion('3.0.0', '3.0.1') // returns true
maxVersion('3.2.4', '3.2.5') // returns true

maxVersion('1.0.1', '1.0.0') // returns false
maxVersion('2.2.0', '2.1.0') // returns false
maxVersion('1.1', '1') // returns false
```

## minVersion

Checks if a version is greater or equal to a given one.

This function validates version numbers that have only numbers sepatared by periods.  
- Valid: '8.3.8', '5.0', '3.22.2', '10', '126.0.6478.63' ...
- Invalid: '2.0.0-rc.1', '1.0.0-beta' ...
  
```php
minVersion(string $version, string $required): bool
```

<h3>Trait Namespace</h3>

```php
use Torugo\TString\Traits\Validators\TStringMinVersion;
```

<h3>Examples</h3>

```php
minVersion('1.0.0', '1.0.0') // returns true
minVersion('2.1', '2.0.0') // returns true
minVersion('1.0.9', '1') // returns true
minVersion('3.2.5', '3.2.5') // returns true

minVersion('1.0.0', '1.0.1') // returns false
minVersion('2.1.0', '2.2.0') // returns false
minVersion('1', '1.1') // returns false
```


<!-- MARK: Manipulators -->

# Manipulators

## append
> Under development

## capitalize
> Under development

## prepend
> Under development

## replace
> Under development

## toLowercase
> Under development

## toUppercase
> Under development


# Contribute
It is currently not open to contributions, I intend to make it available as soon as possible.


# License
This library is licensed under the MIT License - see the LICENSE file for details.
