<?php

namespace App\TestsPsycho;

use App\Interfaces\Test;

class Saying implements Test
{
    public function getContentLayout(): string
    {
        return 'tests/layouts/saying/content.html.twig';
    }

    public function getResultLayout(): string
    {
        return 'tests/layouts/saying/result.html.twig';
    }

    public function save()
    {
    }
}
