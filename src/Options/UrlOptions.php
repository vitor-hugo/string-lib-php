<?php declare(strict_types=1);

namespace Torugo\TString\Options;

class UrlOptions
{
    public function __construct(
        public array $protocols = ["http", "https", "ftp"],
        public bool $requireProtocol = false,
        public bool $requireValidProtocol = true,
        public bool $requireTld = true,
        public bool $requireHost = true,
        public bool $requirePort = false,
        public bool $allowUnderscores = false,
        public bool $allowTrailingDot = false,
        public bool $allowProtocolRelativeUrls = false,
        public bool $allowFragments = true,
        public bool $allowQueryComponents = true,
        public bool $allowAuth = true,
        public bool $allowNumericTld = false,
        public bool $allowWildcard = false,
        public bool $validateLength = true,
        public bool $ignoreMaxLength = false
    ) {
    }
}
