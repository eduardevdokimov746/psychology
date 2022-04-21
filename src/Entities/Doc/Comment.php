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

    /**
     * @param ClientProfile $clientProfile
     * @param Consultation $consultation
     * @param string $comment
     */
    public function __construct(ClientProfile $clientProfile, Consultation $consultation, string $comment)
    {
        $this->setClientProfile($clientProfile);
        $this->setConsultation($consultation);
        $this->setComment($comment);
    }

    /**
     * @return ClientProfile
     */
    public function getClientProfile(): ClientProfile
    {
        return $this->clientProfile;
    }

    /**
     * @param ClientProfile $clientProfile
     */
    public function setClientProfile(ClientProfile $clientProfile): void
    {
        $this->clientProfile = $clientProfile;
    }

    /**
     * @return Consultation
     */
    public function getConsultation(): Consultation
    {
        return $this->consultation;
    }

    /**
     * @param Consultation $consultation
     */
    public function setConsultation(Consultation $consultation): void
    {
        $this->consultation = $consultation;
    }

    /**
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment(string $comment): void
    {
        $this->comment = $comment;
    }
}