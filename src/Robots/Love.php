<?php

namespace App\Robots;

use App\Interfaces\Robot;

class Love implements Robot
{
    protected string $layoutsFolderName = 'love';

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
