<?php

namespace App\TestsPsycho;

use App\Entities\Doc\TestResult;
use App\Entities\Doc\User;
use App\Interfaces\Test;
use Doctrine\ORM\EntityManagerInterface;

class Anxiety implements Test
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
        return 'tests/layouts/anxiety/content.html.twig';
    }

    public function getResultLayout(): string
    {
        return 'tests/layouts/anxiety/result.html.twig';
    }

    public function getPayload(): array
    {
        return [
            'slug' => $this->slug
        ];
    }

    public function save(mixed $data, EntityManagerInterface $entityManager, User $user)
    {
        $test = $entityManager->getRepository('Doc:Test')->findOneBy(['slug' => $this->slug]);

        $testResult = new TestResult($test, $user->getClientProfile(), $data);

        $entityManager->persist($testResult);

        $entityManager->flush();
    }
}
