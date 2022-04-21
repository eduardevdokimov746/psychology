<?php

namespace App\Entities\Doc;

use App\Entities\Book\Role;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity]
#[ORM\Table(name: 'doc_users')]
class User
{
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255, unique: true)]
    private string $email;

    #[ORM\Column(type: 'string', length: 255)]
    private string $password;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private string $email_confirmation;

    #[ORM\ManyToOne(targetEntity: Role::class, cascade: ['persist'])]
    private Role $role;

    #[ORM\OneToOne(targetEntity: ClientProfile::class, mappedBy: 'user', fetch: 'EAGER', cascade: ['persist'])]
    private ?ClientProfile $clientProfile = null;

    /**
     * @return ClientProfile
     */
    public function getClientProfile(): ?ClientProfile
    {
        return $this->clientProfile;
    }

    /**
     * @param ClientProfile $clientProfile
     */
    public function setClientProfile(ClientProfile $clientProfile): void
    {
        $clientProfile->setUser($this);

        $this->clientProfile = $clientProfile;
    }

    public function __construct(string $email, string $password, Role $role)
    {
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setRole($role);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);

        return $this;
    }

    public function getEmailConfirmation(): ?string
    {
        return $this->email_confirmation;
    }

    public function setEmailConfirmation(?string $email_confirmation): self
    {
        $this->email_confirmation = $email_confirmation;

        return $this;
    }

    public function getRole(): ?Role
    {
        return $this->role;
    }

    public function setRole(Role $role): self
    {
        $this->role = $role;

        return $this;
    }
}
