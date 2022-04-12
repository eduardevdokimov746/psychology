<?php

namespace App\TestsPsycho;

use App\Interfaces\Test;

class Anxiety implements Test
{
    public function getContentLayout(): string
    {
        return 'tests/layouts/anxiety/content.html.twig';
    }

    public function getResultLayout(): string
    {
        return 'tests/layouts/anxiety/result.html.twig';
    }

    public function save()
    {
    }
}
