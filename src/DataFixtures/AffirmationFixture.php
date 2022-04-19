<?php

namespace App\DataFixtures;

use App\Entities\Doc\Affirmation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AffirmationFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $affirmations = [
            'Меня поддерживает и любит Бог /Творец / Вселенная / и т. д.',
            'Я прощаю себя за все свои ошибки, неудачи и недостатки.',
            'Я уважаю себя и требую к себе уважительного отношения.',
            'Всегда есть другой путь. Всегда есть решение моих проблем.',
            'Я люблю себя за тот путь, который я прошел(а) в своем прошлом.',
            'Моя жизнь имеет значение. Я способствую прогрессу человечества.',
            'Я отношусь к себе с добром и с добром отношусь ко всем остальным.',
            'Сегодня я закладываю фундамент для прекрасного будущего.',
            'Со мной легко разговаривать. Я уверен, когда я рядом с другими.',
            'Я люблю и принимаю себя безоговорочно за все свои плюсы и минусы.',
            'Я люблю в себе свои сильные и слабые стороны.',
            'Я люблю себя, когда делаю глупости.',
            'Я принимаю правильные решения.'
        ];

        foreach ($affirmations as $affirmation) {
            $manager->persist(new Affirmation($affirmation));
        }

        $manager->flush();
    }
}
