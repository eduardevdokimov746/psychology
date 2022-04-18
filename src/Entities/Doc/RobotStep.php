<?php

namespace App\Entities\Doc;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity]
#[ORM\Table(name: 'doc_robot_steps')]
class RobotStep
{
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'bigint')]
    private string $id;

    #[ORM\ManyToOne(targetEntity: Robot::class)]
    private Robot $robot;

    #[ORM\ManyToOne(targetEntity: ClientProfile::class)]
    private ClientProfile $clientProfile;

    #[ORM\Column(type: 'string', length: 10)]
    private string $step;

    #[ORM\Column(type: 'json')]
    private array $data;
}