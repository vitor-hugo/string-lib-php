<?php declare(strict_types=1);

namespace Torugo\TString;

use Torugo\TString\Traits\Handlers\TStringToLowerCase;
use Torugo\TString\Traits\Handlers\TStringToString;
use Torugo\TString\Traits\Handlers\TStringToTitleCase;
use Torugo\TString\Traits\Handlers\TStringToUpperCase;
use Torugo\TString\Traits\Validators\TStringContains;
use Torugo\TString\Traits\Validators\TStringIsAlpha;
use Torugo\TString\Traits\Validators\TStringIsAlphanumeric;
use Torugo\TString\Traits\Validators\TStringIsBase64;
use Torugo\TString\Traits\Validators\TStringIsCnpj;
use Torugo\TString\Traits\Validators\TStringIsCpf;
use Torugo\TString\Traits\Validators\TStringIsEmail;
use Torugo\TString\Traits\Validators\TStringIsFQDN;
use Torugo\TString\Traits\Validators\TStringIsHexadecimal;
use Torugo\TString\Traits\Validators\TStringIsIP;
use Torugo\TString\Traits\Validators\TStringIsLength;
use Torugo\TString\Traits\Validators\TStringIsNumeric;
use Torugo\TString\Traits\Validators\TStringIsSemVer;
use Torugo\TString\Traits\Validators\TStringIsUrl;
use Torugo\TString\Traits\Validators\TStringMaxLength;
use Torugo\TString\Traits\Validators\TStringMaxVersion;
use Torugo\TString\Traits\Validators\TStringMinLength;
use Torugo\TString\Traits\Validators\TStringMinVersion;

/**
 * Small toolset for validating and manipulating strings.
 *
 * @link https://github.com/vitor-hugo/string-lib-php
 */
class TString
{
    use TStringContains;
    use TStringIsAlpha;
    use TStringIsAlphanumeric;
    use TStringIsBase64;
    use TStringIsCnpj;
    use TStringIsCpf;
    use TStringIsEmail;
    use TStringIsFQDN;
    use TStringIsHexadecimal;
    use TStringIsIP;
    use TStringIsLength;
    use TStringIsNumeric;
    use TStringIsSemVer;
    use TStringIsUrl;
    use TStringMaxLength;
    use TStringMaxVersion;
    use TStringMinLength;
    use TStringMinVersion;

    use TStringToLowerCase;
    use TStringToString;
    use TStringToTitleCase;
    use TStringToUpperCase;
}
