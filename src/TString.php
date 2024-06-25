<?php declare(strict_types=1);

namespace Torugo\TString;

use Torugo\TString\Traits\Validators\TStringContains;
use Torugo\TString\Traits\Validators\TStringIsAlpha;
use Torugo\TString\Traits\Validators\TStringIsAlphanumeric;
use Torugo\TString\Traits\Validators\TStringIsBase64;
use Torugo\TString\Traits\Validators\TStringIsCnpj;
use Torugo\TString\Traits\Validators\TStringIsCpf;
use Torugo\TString\Traits\Validators\TStringIsLength;
use Torugo\TString\Traits\Validators\TStringIsNumeric;
use Torugo\TString\Traits\Validators\TStringMaxLength;
use Torugo\TString\Traits\Validators\TStringMaxVersion;
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
    use TStringIsLength;
    use TStringIsNumeric;
    use TStringMaxLength;
    use TStringMaxVersion;
    use TStringMinVersion;
}
