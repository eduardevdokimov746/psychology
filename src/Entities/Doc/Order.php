<?php

namespace App\Entities\Doc;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity]
#[ORM\Table(name: 'doc_orders')]
class Order
{
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'bigint')]
    private string $id;

    #[ORM\Column(type: 'string', length: 10, unique: true, options: ['fixed' => true])]
    private string $uniqueNumber;

    #[ORM\Column(type: 'string', length: 255)]
    private string $email;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private float $sum;

    #[ORM\ManyToOne(targetEntity: ClientProfile::class)]
    private ClientProfile $clientProfile;
}