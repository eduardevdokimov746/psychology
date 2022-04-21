<?php

namespace App\Entities\Doc;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\PersistentCollection;
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
    #[ORM\JoinColumn(nullable: true)]
    private ClientProfile $clientProfile;

    #[ORM\OneToMany(targetEntity: OrderItem::class, mappedBy: 'order')]
    private PersistentCollection|ArrayCollection $orderItems;

    /**
     * @return ArrayCollection|PersistentCollection
     */
    public function getOrderItems(): ArrayCollection|PersistentCollection
    {
        return $this->orderItems;
    }

    /**
     * @param string $uniqueNumber
     * @param string $email
     * @param float $sum
     * @param ClientProfile $clientProfile
     */
    public function __construct(string $uniqueNumber, string $email, float $sum)
    {
        $this->setUniqueNumber($uniqueNumber);
        $this->setEmail($email);
        $this->setSum($sum);

        $this->orderItems = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getUniqueNumber(): string
    {
        return $this->uniqueNumber;
    }

    /**
     * @param string $uniqueNumber
     */
    public function setUniqueNumber(string $uniqueNumber): void
    {
        $this->uniqueNumber = $uniqueNumber;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return float
     */
    public function getSum(): float
    {
        return $this->sum;
    }

    /**
     * @param float $sum
     */
    public function setSum(float $sum): void
    {
        $this->sum = $sum;
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
}