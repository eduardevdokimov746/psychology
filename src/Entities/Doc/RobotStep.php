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

    /**
     * @param Robot $robot
     * @param ClientProfile $clientProfile
     * @param string $step
     * @param array $data
     */
    public function __construct(Robot $robot, ClientProfile $clientProfile, string $step, array $data)
    {
        $this->setRobot($robot);
        $this->setClientProfile($clientProfile);
        $this->setStep($step);
        $this->setData($data);
    }

    /**
     * @return Robot
     */
    public function getRobot(): Robot
    {
        return $this->robot;
    }

    /**
     * @param Robot $robot
     */
    public function setRobot(Robot $robot): void
    {
        $this->robot = $robot;
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
     * @return string
     */
    public function getStep(): string
    {
        return $this->step;
    }

    /**
     * @param string $step
     */
    public function setStep(string $step): void
    {
        $this->step = $step;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData(array $data): void
    {
        $this->data = $data;
    }
}