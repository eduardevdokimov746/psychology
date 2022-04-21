<?php

namespace App\Entities\Doc;

use App\Entities\Book\Problem;
use App\Repositories\Doc\PsychologistProfileRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\PersistentCollection;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: PsychologistProfileRepository::class)]
#[ORM\Table(name: 'doc_psychologist_profiles')]
class PsychologistProfile
{
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $firstName = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $lastName = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $patronymic = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $education = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $avatar = null;

    #[ORM\OneToOne(targetEntity: User::class)]
    private User $user;

    #[ORM\ManyToMany(targetEntity: Problem::class)]
    #[ORM\JoinTable(name: 'cross_psychologist_profiles_work_problems')]
    #[ORM\JoinColumn(name: 'psychologist_profile_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'problem_id', referencedColumnName: 'id')]
    private PersistentCollection|ArrayCollection $workWithProblems;

    #[ORM\ManyToMany(targetEntity: Problem::class)]
    #[ORM\JoinTable(name: 'cross_psychologist_profiles_dont_work_problems')]
    #[ORM\JoinColumn(name: 'psychologist_profile_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'problem_id', referencedColumnName: 'id')]
    private PersistentCollection|ArrayCollection $dontWorkWithProblems;

    public function __construct(User $user)
    {
        $this->workWithProblems = new ArrayCollection();
        $this->dontWorkWithProblems = new ArrayCollection();

        $this->setUser($user);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return ArrayCollection|PersistentCollection
     */
    public function getWorkWithProblems(): ArrayCollection|PersistentCollection
    {
        return $this->workWithProblems;
    }

    /**
     * @return ArrayCollection|PersistentCollection
     */
    public function getDontWorkWithProblems(): ArrayCollection|PersistentCollection
    {
        return $this->dontWorkWithProblems;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getPatronymic(): ?string
    {
        return $this->patronymic;
    }

    public function setPatronymic(?string $patronymic): self
    {
        $this->patronymic = $patronymic;

        return $this;
    }

    public function getEducation(): ?string
    {
        return $this->education;
    }

    public function setEducation(?string $education): self
    {
        $this->education = $education;

        return $this;
    }

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(?string $avatar): self
    {
        $this->avatar = $avatar;

        return $this;
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

    public function addWorkProblem(Problem $problem): self
    {
        $this->workWithProblems->add($problem);

        return $this;
    }

    public function addDontWorkProblem(Problem $problem): self
    {
        $this->dontWorkWithProblems->add($problem);

        return $this;
    }
}
