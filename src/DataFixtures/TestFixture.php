<?php

namespace App\DataFixtures;

use App\Entities\Doc\Test;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TestFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $tests = [
            [
                'title' => 'Определение подходящей профессии (дифференциально диагностический опросник Климова Е.А.)',
                'previewImg' => 'images/tests/1.jpeg',
                'slug' => 'opredelenie-podhodasej-professii'
            ],
            [
                'title' => 'Тест на вероятность суицида',
                'previewImg' => 'images/tests/2.jpeg',
                'slug' => 'veroatnost-suicida'
            ],
            [
                'title' => 'Тест "30 пословиц". Стратегия вашего поведения в конфликте (для подростков)',
                'previewImg' => 'images/tests/3.jpeg',
                'slug' => '30-poslovic-strategia-vasego-povedenia-v-konflikte'
            ],
            [
                'title' => 'Тест на тревожность Спилбергера Ханина',
                'previewImg' => 'images/tests/4.jpeg',
                'slug' => 'trevoznost-spilbergera-hanina'
            ],
            [
                'title' => 'Экспресс-тест на наличие обсессивно-компульсивного расстройства',
                'previewImg' => 'images/tests/5.jpeg',
                'slug' => 'nalicie-obsessivno-kompulsivnogo-rasstrojstva'
            ],
            [
                'title' => 'Тест на степень развития обсессивно-компульсивного расстройства (шкала Йеля-Брауна)',
                'previewImg' => 'images/tests/6.jpeg',
                'slug' => 'obsessivno-kompulsivnogo-rasstrojstva'
            ],
        ];

        foreach ($tests as $test) {
            $manager->persist(
                (new Test($test['title'], $test['previewImg']))
                    ->setSlug($test['slug'])
            );
        }

        $manager->flush();
    }
}
