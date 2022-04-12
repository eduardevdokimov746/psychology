<?php

namespace App\TestsPsycho;

use App\Interfaces\Test;

class AvailabilityOkr implements Test
{
    public function getContentLayout(): string
    {
        return 'tests/layouts/nalicie_okr/content.html.twig';
    }

    public function getResultLayout(): string
    {
        return 'tests/layouts/nalicie_okr/result.html.twig';
    }

    public function save()
    {
    }
}
