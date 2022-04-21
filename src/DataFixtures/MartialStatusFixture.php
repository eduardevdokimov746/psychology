<?php

namespace App\DataFixtures;

use App\Entities\Book\MartialStatus;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MartialStatusFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $martialStatuses = [
            'Холост',
            'Есть девушка / парень',
            'Замужем / женат',
            'Незарегистрированный брак (сожители)',
            'В разводе',
            'Все сложно',
            'Вдовец / вдова',
            'Другое',
        ];

        foreach ($martialStatuses as $martialStatus) {
            $manager->persist(new MartialStatus($martialStatus));
        }

        $manager->flush();
    }
}
