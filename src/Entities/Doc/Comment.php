<?php

namespace App\Entities\Doc;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity]
#[ORM\Table(name: 'doc_comments')]
class Comment
{
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'bigint')]
    private string $id;

    #[ORM\ManyToOne(targetEntity: ClientProfile::class)]
    private ClientProfile $clientProfile;

    #[ORM\ManyToOne(targetEntity: Consultation::class)]
    private Consultation $consultation;

    #[ORM\Column(type: 'string')]
    private string $comment;
}