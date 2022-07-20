<?php

namespace App\Enums;

enum QuestionTypes
{
    case text;
    case textarea;
    case checkbox;
    case check;
    case date;
    case select;
    case integer;
    case radio;
    case phone;
    case email;

    /**
     * @return array<string>
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'name');
    }
}
