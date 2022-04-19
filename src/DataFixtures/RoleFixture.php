<?php

namespace App\DataFixtures;

use App\Controllers\AffirmationController;
use App\Entities\Book\Role;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RoleFixture extends Fixture
{
    public const REFERENCE = 'roles';

    public function load(ObjectManager $manager): void
    {
        $roles = [
            [
                'name' => 'admin',
                'description' => 'Администратор'
            ],
            [
                'name' => 'psychologist',
                'description' => 'Психолог'
            ],
            [
                'name' => 'client',
                'description' => 'Клиент'
            ]
        ];

        foreach ($roles as $role) {
            $roleObject = new Role($role['name'], $role['description']);

            $this->addReference(self::getNameReference($roleObject->getName()), $roleObject);

            $manager->persist($roleObject);
        }

        $manager->flush();
    }

    public static function getNameReference(string $role): string
    {
        return self::REFERENCE . '.' . $role;
    }
}
