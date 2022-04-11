<?php

namespace App\TestsPsycho;

use App\Interfaces\Test;

class ProfOrientation implements Test
{
    public function getContentLayout(): string
    {
        return 'tests/layouts/opredelenie_podhodasej_professii/content.html.twig';
    }

    public function getResultLayout(): string
    {
        return 'tests/layouts/opredelenie_podhodasej_professii/result.html.twig';
    }

    public function save()
    {
    }
}
