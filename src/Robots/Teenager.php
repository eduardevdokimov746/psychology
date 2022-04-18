<?php

namespace App\Robots;

use App\Interfaces\Robot;

class Teenager implements Robot
{
    protected string $layoutsFolderName = 'teenager';

    public function getContentLayout(string $step): string
    {
        return sprintf('/robot/layouts/%s/%s.html.twig', $this->layoutsFolderName, $step);
    }

    public function getResultLayout(): string
    {
        return 'asd';
    }

    public function save()
    {
    }
}
