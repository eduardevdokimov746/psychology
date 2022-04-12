<?php

namespace App\TestsPsycho;

use App\Interfaces\Test;

class Okr implements Test
{
    public function getContentLayout(): string
    {
        return 'tests/layouts/okr/content.html.twig';
    }

    public function getResultLayout(): string
    {
        return 'tests/layouts/okr/result.html.twig';
    }

    public function save()
    {
    }
}
