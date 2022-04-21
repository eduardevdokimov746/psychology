<?php

namespace App\DatabaseTypes;

use App\Constants\Gender;
use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Platforms\AbstractPlatform;

class GenderType extends Type
{
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        /** @var Gender $value */
        return !is_null($value) ? $value->value : null;
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return Gender::tryFrom($value);
    }

    public function getSQLDeclaration(array $column, AbstractPlatform $platform)
    {
        return 'gender';
    }

    public function getName()
    {
        return 'gender';
    }
}