<?php

namespace App\DataFixtures;

use App\Entities\Book\Role;
use App\Entities\Doc\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class UserFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $userTemplate = [
            'email' => 'example%s@mail.com',
            'password' => '123'
        ];

        $admin = [
            'email' => 'admin@mail.com',
            'password' => '123'
        ];


        $manager->persist(new User($admin['email'], $admin['password'], $this->getReferenceRole('admin')));

        for ($i = 1; $i < 11; $i++) {
            $name = sprintf($userTemplate['email'], $i);

            $userPsychologist = new User($name, $userTemplate['password'], $this->getReferenceRole('psychologist'));

            $this->addReference('users.psych.' . $i, $userPsychologist);

            $manager->persist($userPsychologist);
        }

        $manager->persist(new User('client@mail.com', '123', $this->getReferenceRole('client')));

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            RoleFixture::class
        ];
    }

    protected function getReferenceRole(string $role): Role
    {
        /** @var Role $roleObject */
        $roleObject = $this->getReference(RoleFixture::getNameReference($role));

        return $roleObject;
    }
}
