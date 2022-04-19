<?php

namespace App\TestsPsycho;

use App\Interfaces\Test;

class Veroyatnost implements Test
{
    public function getContentLayout(): string
    {
        return 'tests/layouts/veroatnost_suicida/content.html.twig';
    }

    public function getResultLayout(): string
    {
        return 'tests/layouts/veroatnost_suicida/result.html.twig';
    }

    public function save()
    {
    }
}
