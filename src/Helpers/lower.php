<?php

namespace App\Helpers;

use Symfony\Component\String\Slugger\AsciiSlugger;
use Symfony\Component\String\UnicodeString;

function lower(string $str): string
{
    $unicodeStr = new UnicodeString($str);
    $snake = $unicodeStr->snake()->toString();

    return (new AsciiSlugger())->slug($snake);
}
