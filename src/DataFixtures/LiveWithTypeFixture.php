<?php

namespace App\DataFixtures;

use App\Entities\Book\LiveWithTypes;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LiveWithTypeFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $liveWithTypes = [
            'Один (одна)',
            'С родителями (мама, папа)',
            'С мамой (вдвоем)',
            'С папой (вдвоем)',
            'С бабушкой / дедушкой',
            'С родителями (мама, папа) и братьями / сестрами',
            'С женой / мужем',
            'С женой / мужем и детьми',
            'С ребенком (детьми)',
            'С другом / подругой',
            'С девушкой / парнем',
            'По-разному, периодически переезжаю',
            'С большой семьей (мама, папа, бабушки / дедушки, браться / сестры и т.д.)',
            'Другое'
        ];

        foreach ($liveWithTypes as $liveWithType) {
            $manager->persist(new LiveWithTypes($liveWithType));
        }

        $manager->flush();
    }
}
