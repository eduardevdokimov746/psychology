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
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;
    #[ORM\OneToOne(targetEntity: User::class, inversedBy: 'clientProfile', cascade: ['persist'])]
    private User $user;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $firstName = null;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $lastName = null;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $patronymic = null;
    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTime $dateOfBirth = null;
    #[ORM\Column(type: 'gender', nullable: true)]
    private ?Gender $gender = null;
    #[ORM\ManyToOne(targetEntity: LiveWithTypes::class, fetch: 'EAGER', cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: true)]
    private ?LiveWithTypes $liveWithType = null;
    #[ORM\ManyToOne(targetEntity: MartialStatus::class, fetch: 'EAGER', cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: true)]
    private ?MartialStatus $martialStatus = null;
    #[ORM\Column(type: 'boolean', options: ['default' => false])]
    private bool $hasChildren = false;
    #[ORM\ManyToOne(targetEntity: WorkType::class, fetch: 'EAGER', cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: true)]
    private ?WorkType $workType = null;
    #[ORM\Column(type: 'smallint', nullable: true)]
    private ?int $weight = null;
    #[ORM\Column(type: 'smallint', nullable: true)]
    private ?int $height = null;

    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->setUser($user);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): ?self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string
     */
    public function getPatronymic(): ?string
    {
        return $this->patronymic;
    }

    /**
     * @param string $patronymic
     */
    public function setPatronymic(string $patronymic): self
    {
        $this->patronymic = $patronymic;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getDateOfBirth(): ?\DateTime
    {
        return $this->dateOfBirth;
    }

    /**
     * @param \DateTime|null $dateOfBirth
     */
    public function setDateOfBirth(?\DateTime $dateOfBirth): self
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    /**
     * @return Gender|null
     */
    public function getGender(): ?Gender
    {
        return $this->gender;
    }

    use TimestampableEntity;

    /**
     * @param Gender|null $gender
     */
    public function setGender(?Gender $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * @return LiveWithTypes|null
     */
    public function getLiveWithType(): ?LiveWithTypes
    {
        return $this->liveWithType;
    }

    /**
     * @param LiveWithTypes|null $liveWithType
     */
    public function setLiveWithType(?LiveWithTypes $liveWithType): self
    {
        $this->liveWithType = $liveWithType;

        return $this;
    }

    /**
     * @return MartialStatus|null
     */
    public function getMartialStatus(): ?MartialStatus
    {
        return $this->martialStatus;
    }

    /**
     * @param MartialStatus|null $martialStatus
     */
    public function setMartialStatus(?MartialStatus $martialStatus): self
    {
        $this->martialStatus = $martialStatus;

        return $this;
    }

    /**
     * @return bool
     */
    public function isHasChildren(): bool
    {
        return $this->hasChildren;
    }

    /**
     * @param bool $hasChildren
     */
    public function setHasChildren(bool $hasChildren): self
    {
        $this->hasChildren = $hasChildren;

        return $this;
    }

    /**
     * @return WorkType|null
     */
    public function getWorkType(): ?WorkType
    {
        return $this->workType;
    }

    /**
     * @param WorkType|null $workType
     */
    public function setWorkType(?WorkType $workType): self
    {
        $this->workType = $workType;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getWeight(): ?int
    {
        return $this->weight;
    }

    /**
     * @param int|null $weight
     */
    public function setWeight($weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getHeight(): ?int
    {
        return $this->height;
    }

    /**
     * @param int|null $height
     */
    public function setHeight($height): self
    {
        $this->height = $height;

        return $this;
    }
}