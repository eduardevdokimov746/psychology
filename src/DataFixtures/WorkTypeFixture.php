<?php

namespace App\DataFixtures;

use App\Entities\Book\WorkType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class WorkTypeFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $workTypes = [
            'работаю',
            'не работаю (в поиске работы)',
            'бизнесом / работаю на себя',
            'учусь',
            'пока что ничем'
        ];

        foreach ($workTypes as $workType) {
            $manager->persist(new WorkType($workType));
        }


        $manager->flush();
    }
}
