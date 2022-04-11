<?php

namespace App\Interfaces;

interface Test
{
    public function getContentLayout(): string;

    public function getResultLayout(): string;

    public function save();
}
