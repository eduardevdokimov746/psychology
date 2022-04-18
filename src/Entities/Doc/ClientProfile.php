<?php

namespace App\Entities\Doc;

use App\Constants\Gender;
use App\Entities\Book\LiveWithTypes;
use App\Entities\Book\MartialStatus;
use App\Entities\Book\WorkType;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity]
#[ORM\Table(name: 'doc_client_profiles')]
class ClientProfile
{
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\OneToOne(targetEntity: User::class)]
    private User $user;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private string $firstName;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private string $lastName;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private string $patronymic;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTime $dateOfBirth;

    #[ORM\Column(type: 'gender', nullable: true)]
    private ?Gender $gender;

    #[ORM\ManyToOne(targetEntity: LiveWithTypes::class)]
    #[ORM\JoinColumn(nullable: true)]
    private ?LiveWithTypes $liveWithType;

    #[ORM\ManyToOne(targetEntity: MartialStatus::class)]
    #[ORM\JoinColumn(nullable: true)]
    private ?MartialStatus $martialStatus;

    #[ORM\Column(type: 'boolean', options: ['default' => false])]
    private bool $hasChildren = false;

    #[ORM\ManyToOne(targetEntity: WorkType::class)]
    #[ORM\JoinColumn(nullable: true)]
    private ?WorkType $workType;

    #[ORM\Column(type: 'smallint', nullable: true)]
    private ?int $weight;

    #[ORM\Column(type: 'smallint', nullable: true)]
    private ?int $height;
}