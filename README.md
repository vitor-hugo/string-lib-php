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
  - [isAplha](#isaplha)
  - [isAplhanumeric](#isaplhanumeric)
  - [isBase64](#isbase64)
  - [isCnpj](#iscnpj)
  - [isCpf](#iscpf)
  - [isEmail](#isemail)
  - [isNumeric](#isnumeric)
  - [lengthRange](#lengthrange)
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

## isAplha
> Under development

## isAplhanumeric
> Under development

## isBase64
> Under development

## isCnpj
> Under development

## isCpf
> Under development

## isEmail
> Under development

## isNumeric
> Under development

## lengthRange
> Under development

## matchRegex
> Under development

## maxLength
> Under development

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
