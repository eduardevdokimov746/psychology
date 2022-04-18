<?php

namespace App\Interfaces;

interface Robot
{
    public function getContentLayout(string $step): string;

    public function getResultLayout(): string;

    public function save();
}
