<?php

namespace App\Factories;

use App\Interfaces\Test;
use App\TestsPsycho\Anxiety;
use App\TestsPsycho\AvailabilityOkr;
use App\TestsPsycho\Okr;
use App\TestsPsycho\ProfOrientation;
use App\TestsPsycho\Saying;
use App\TestsPsycho\Veroyatnost;

class TestFactory
{
    public static function makeTest(string $slug): Test
    {
        return match ($slug) {
            'opredelenie-podhodasej-professii' => new ProfOrientation($slug),
            'veroatnost-suicida' => new Veroyatnost($slug),
            'obsessivno-kompulsivnogo-rasstrojstva' => new Okr($slug),
            'nalicie-obsessivno-kompulsivnogo-rasstrojstva' => new AvailabilityOkr($slug),
            'trevoznost-spilbergera-hanina' => new Anxiety($slug),
            '30-poslovic-strategia-vasego-povedenia-v-konflikte' => new Saying($slug)
        };
    }
}
