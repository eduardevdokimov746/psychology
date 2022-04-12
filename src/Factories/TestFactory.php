<?php

namespace App\Factories;

use App\Interfaces\Test;
use App\TestsPsycho\Anxiety;
use App\TestsPsycho\AvailabilityOkr;
use App\TestsPsycho\Okr;
use App\TestsPsycho\ProfOrientation;
use App\TestsPsycho\Saying;
use App\TestsPsycho\Veroaytnost;

class TestFactory
{
    public static function makeTest(string $slug): Test
    {
        return match ($slug) {
            'opredelenie-podhodasej-professii' => new ProfOrientation(),
            'veroatnost-suicida' => new Veroaytnost(),
            'obsessivno-kompulsivnogo-rasstrojstva' => new Okr(),
            'nalicie-obsessivno-kompulsivnogo-rasstrojstva' => new AvailabilityOkr(),
            'trevoznost-spilbergera-hanina' => new Anxiety(),
            '30-poslovic-strategia-vasego-povedenia-v-konflikte' => new Saying()
        };
    }
}
