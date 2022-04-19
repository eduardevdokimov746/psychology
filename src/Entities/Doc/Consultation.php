<?php

namespace App\Entities\Doc;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity]
#[ORM\Table(name: 'doc_consultations')]
class Consultation
{
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\ManyToOne(targetEntity: PsychologistProfile::class)]
    #[ORM\JoinColumn(nullable: true)]
    private ?PsychologistProfile $psychologistProfile;

    #[ORM\Column(type: 'string', length: 255)]
    private string $title;

    #[ORM\Column(type: 'text')]
    private string $description;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private float $price;

    #[ORM\Column(type: 'smallint', nullable: true)]
    private ?int $duration;

    #[ORM\Column(type: 'string', length: 255)]
    private string $img;

    public function __construct(string $title, string $description, float $price, string $img)
    {
        $this->setTitle($title);
        $this->setDescription($description);
        $this->setPrice($price);
        $this->setImg($img);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return PsychologistProfile|null
     */
    public function getPsychologistProfile(): ?PsychologistProfile
    {
        return $this->psychologistProfile;
    }

    /**
     * @param PsychologistProfile|null $psychologistProfile
     */
    public function setPsychologistProfile(?PsychologistProfile $psychologistProfile): self
    {
        $this->psychologistProfile = $psychologistProfile;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getDuration(): ?int
    {
        return $this->duration;
    }

    /**
     * @param int|null $duration
     */
    public function setDuration(?int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * @return string
     */
    public function getImg(): string
    {
        return $this->img;
    }

    /**
     * @param string $img
     */
    public function setImg(string $img): self
    {
        $this->img = $img;

        return $this;
    }
}