<?php

namespace App\Factories;

use App\Interfaces\Robot;
use App\Robots\Samoocenka;
use App\Robots\Teenager;

class RobotFactory
{
    public static function makeRobot(string $slug): Robot
    {
        return match ($slug) {
            'podrostkovye-problemy-s-roditelami-s-semej' => new Teenager(),
            'zanizennaa-samoocenka-nelubov-k-sebe-nepriatie-seba' => new Samoocenka()
        };
    }
}
