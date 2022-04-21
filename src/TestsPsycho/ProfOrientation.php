<?php

namespace App\TestsPsycho;

use App\Entities\Doc\TestResult;
use App\Entities\Doc\User;
use App\Interfaces\Test;
use Doctrine\ORM\EntityManagerInterface;

class ProfOrientation implements Test
{
    protected string $slug;

    /**
     * @param string $slug
     */
    public function __construct(string $slug)
    {
        $this->slug = $slug;
    }

    public function getContentLayout(): string
    {
        return 'tests/layouts/opredelenie_podhodasej_professii/content.html.twig';
    }

    public function getResultLayout(): string
    {
        return 'tests/layouts/opredelenie_podhodasej_professii/result.html.twig';
    }

    public function getPayload(): array
    {
        $naturePercent = round(mt_rand(10, 50) / 2);
        $techiquePercent = round(mt_rand($naturePercent, 50) / 2);
        $humanPercent = round(mt_rand($techiquePercent, 50) / 2);
        $systemPercent = round(mt_rand($humanPercent, 50) / 2);
        $imagePercent = 100 - ($naturePercent + $techiquePercent + $humanPercent + $systemPercent);

        return [
            'nature_percent' => $naturePercent,
            'technique_percent' => $techiquePercent,
            'human_percent' => $humanPercent,
            'system_percent' => $systemPercent,
            'image_percent' => $imagePercent,
        ];
    }

    public function save(mixed $data, EntityManagerInterface $entityManager, User $user)
    {
        $test = $entityManager->getRepository('Doc:Test')->findOneBy(['slug' => $this->slug]);

        $clientProfile = $entityManager->getRepository('Doc:ClientProfile')->find($user->getClientProfile()->getId());

        $testResult = new TestResult($test, $clientProfile, $data);

        $entityManager->persist($testResult);

        $entityManager->flush();
    }
}
