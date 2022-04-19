<?php

namespace App\DataFixtures;

use App\Entities\Doc\PsychologistProfile;
use App\Entities\Doc\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;

class PsychologistProfileFixture extends Fixture implements DependentFixtureInterface
{
    protected EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function load(ObjectManager $manager): void
    {
        $psychologistProfiles = [
            [
                'firstName' => 'Марина',
                'lastName' => 'Тилина',
                'education' => null,
                'avatar' => 'images/phsych/tilinina.jpg'
            ],
            [
                'firstName' => 'Роман',
                'lastName' => 'Тужба',
                'education' => 'ЛГУ имени А.С.Пушкина, Психология личности
Московский институт психоанализа, Психология
Ситтер и Пси-терапевт в Институте интеграции психоделиков США, проект Университета Джонса Хопкинса
',
                'avatar' => 'images/phsych/tuzba.png'
            ],
            [
                'firstName' => 'Виктор',
                'lastName' => 'Матвеев',
                'education' => 'КФ МГЭУ ф-т Менеджмента и психологии, «Психологическое консультирование»',
                'avatar' => 'images/phsych/matveev.png'
            ],
            [
                'firstName' => 'Юлия',
                'lastName' => 'Свиридова',
                'education' => 'Тульский государственный педагогический университет им. Л.Н. Толстого, Психология, педагог-психолог/соц.педагог, 2006.',
                'avatar' => 'images/phsych/sviridova.png'
            ],
            [
                'firstName' => 'Анастасия',
                'lastName' => 'Моисеева',
                'education' => 'Российский государственный социальный университет, год окончания 2009, квалификация "Психолог, преподователь психологии", специальность "Психология"',
                'avatar' => 'images/phsych/moiseeva.png'
            ],
            [
                'firstName' => 'Анастасия',
                'lastName' => 'Табакова',
                'education' => null,
                'avatar' => 'images/phsych/1.jpg'
            ],
            [
                'firstName' => 'Кристина',
                'lastName' => 'Муховикова',
                'education' => 'МГУ им. М.В. Ломоносова, 2023 (сейчас на 4 курсе), Факультет Психологии, специальность «Клиническая психология»',
                'avatar' => 'images/phsych/muhovikova.png'
            ],
            [
                'firstName' => 'Вероника',
                'lastName' => 'Ларионова',
                'education' => 'АНО ДПО «ВГАППСС» «Психологическое консультирование и психодиагностика»',
                'avatar' => 'images/phsych/larionova.png'
            ],
            [
                'firstName' => 'Кристина',
                'lastName' => 'Коростылева',
                'education' => 'Кубанский государственный университет (КубГУ), Факультет управления и психологии',
                'avatar' => 'images/phsych/korostiveva.png'
            ],
            [
                'firstName' => 'Анна',
                'lastName' => 'Петрова',
                'education' => 'высшее: Кубанский государственный университет, общая психология
повышения квалификации: Кризисная терапия; Краткосрочное психологическое консультирование',
                'avatar' => 'images/phsych/petrova.png'
            ],
        ];

        foreach ($psychologistProfiles as $key => $psychologistProfile) {
            /** @var User $user */
            $user = $this->getReference('users.psych.' . ($key + 1));

            $psychologistProfile = (new PsychologistProfile($user))
                ->setFirstName($psychologistProfile['firstName'])
                ->setLastName($psychologistProfile['lastName'])
                ->setEducation($psychologistProfile['education'])
                ->setAvatar($psychologistProfile['avatar']);

            $this->setProblems($psychologistProfile);

            $manager->persist($psychologistProfile);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixture::class
        ];
    }

    protected function setProblems(PsychologistProfile $psychologistProfile): void
    {
        $offsetWorkProblems = mt_rand(1, 13);
        $offsetDontWorkProblems = ($offsetWorkProblems + 3) > 13 ? 1 : $offsetWorkProblems + 3;

        $workProblems = $this->entityManager->getRepository('Book:Problem')->createQueryBuilder('p')
            ->setFirstResult($offsetWorkProblems)
            ->setMaxResults(3)
            ->getQuery()
            ->getResult();

        $dontWorkProblems = $this->entityManager->getRepository('Book:Problem')->createQueryBuilder('p')
            ->setFirstResult($offsetDontWorkProblems)
            ->setMaxResults(3)
            ->getQuery()
            ->getResult();

        foreach ($workProblems as $workProblem) {
            $psychologistProfile->addWorkProblem($workProblem);
        }

        foreach ($dontWorkProblems as $dontWorkProblem) {
            $psychologistProfile->addDontWorkProblem($dontWorkProblem);
        }


    }
}
