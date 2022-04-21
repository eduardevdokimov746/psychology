<?php

namespace App\Entities\Doc;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity]
#[ORM\Table(name: 'doc_test_results')]
class TestResult
{
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'bigint')]
    private string $id;

    #[ORM\ManyToOne(targetEntity: Test::class)]
    private Test $test;

    #[ORM\ManyToOne(targetEntity: ClientProfile::class)]
    private ClientProfile $clientProfile;

    #[ORM\Column(type: 'json')]
    private array $data;

    /**
     * @param Test $test
     * @param ClientProfile $clientProfile
     * @param array $data
     */
    public function __construct(Test $test, ClientProfile $clientProfile, array $data)
    {
        $this->setTest($test);
        $this->setClientProfile($clientProfile);
        $this->setData($data);
    }

    /**
     * @return Test
     */
    public function getTest(): Test
    {
        return $this->test;
    }

    /**
     * @param Test $test
     */
    public function setTest(Test $test): void
    {
        $this->test = $test;
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