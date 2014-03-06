<?php

namespace Eo\RedirectBundle\Util;

class RegexUtil
{
    static function regexify($pattern)
    {
        return sprintf('`%s`i', $pattern);
    }
}