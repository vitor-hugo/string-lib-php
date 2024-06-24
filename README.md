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
> Under development

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
> Under development
> 
## minVersion
> Under development


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
