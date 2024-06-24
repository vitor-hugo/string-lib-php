<?php declare(strict_types=1);

namespace Torugo\TString;

use Torugo\TString\Traits\Validators\TStringContains;
use Torugo\TString\Traits\Validators\TStringIsAlpha;
use Torugo\TString\Traits\Validators\TStringIsAlphanumeric;
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
    use TStringMaxVersion;
    use TStringMinVersion;
}
