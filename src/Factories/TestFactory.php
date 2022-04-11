<?php

namespace App\Factories;

use App\Interfaces\Test;
use App\TestsPsycho\ProfOrientation;

class TestFactory
{
    public static function makeTest(string $slug): Test
    {
        return match ($slug) {
            'opredelenie-podhodasej-professii' => new ProfOrientation()
        };
    }
}
