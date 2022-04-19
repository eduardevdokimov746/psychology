<?php

namespace App\DataFixtures;

use App\Entities\Book\Problem;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProblemFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $problems = [
            'панические атаки',
            'депрессивное состояние',
            'прокрастинация, отсутствие мотивации что-либо делать',
            'сложности адаптации в социуме, социофобия',
            'сложности в отношениях с партнёром, родителями, детьми',
            'низкая самооценка',
            'нервные срывы',
            'тревожные состояния',
            'алкогольная зависимость',
            'пищевая зависимость',
            'чувство вины',
            'трудности, связанные с ориентацией',
            'стресс',
            'тревоги',
            'гнев',
            'отчаяние',
            'зависимость',
            'детско-родительские отношения'
        ];

        foreach ($problems as $problem) {
            $manager->persist(new Problem($problem));
        }

        $manager->flush();
    }
}
