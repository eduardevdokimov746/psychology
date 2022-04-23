<?php

namespace App\Robots;

use App\Interfaces\Robot;

class Suicid implements Robot
{
    protected string $layoutsFolderName = 'suicid';

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
