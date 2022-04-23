<?php

namespace App\DataFixtures;

use App\Entities\Doc\Robot;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RobotFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $robots = [
            [
                'title' => 'Заниженная самооценка, нелюбовь к себе',
                'slug' => 'zanizennaa-samoocenka-nelubov-k-sebe-nepriatie-seba',
                'previewImg' => 'images/robot/1.jpeg'
            ],
            [
                'title' => 'Подростковые проблемы с родителями, с семьей',
                'slug' => 'podrostkovye-problemy-s-roditelami-s-semej',
                'previewImg' => 'images/robot/2.jpeg'
            ],
            [
                'title' => 'Безответная любовь, расставание',
                'slug' => 'bezotvetnaa-lubov',
                'previewImg' => 'images/robot/3.jpeg'
            ],
            [
                'title' => 'Суицид (мысли, попытки)',
                'slug' => 'suicid',
                'previewImg' => 'images/robot/4.jpeg'
            ]
        ];

        foreach ($robots as $robot) {
            $manager->persist((new Robot($robot['title'], $robot['previewImg']))->setSlug($robot['slug']));
        }

        $manager->flush();
    }
}
