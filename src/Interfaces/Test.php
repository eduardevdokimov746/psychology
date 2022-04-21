<?php

namespace App\Interfaces;

use App\Entities\Doc\User;
use Doctrine\ORM\EntityManagerInterface;

interface Test
{
    public function getContentLayout(): string;

    public function getResultLayout(): string;

    public function getPayload(): array;

    public function save(mixed $data, EntityManagerInterface $entityManager, User $user);
}
