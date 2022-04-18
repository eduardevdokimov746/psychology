<?php

namespace App\Entities\Doc;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'doc_test_results')]
class TestResult
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'bigint')]
    private string $id;

    #[ORM\ManyToOne(targetEntity: Test::class)]
    private Test $test;

    #[ORM\ManyToOne(targetEntity: ClientProfile::class)]
    private ClientProfile $clientProfile;

    #[ORM\Column(type: 'json')]
    private array $data;
}