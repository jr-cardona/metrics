<?php

namespace App\Enums;

enum QuestionTypes
{
    use AsArrayTrait;

    case text;
    case textarea;
    case check;
    case date;
    case select;
    case number;
    case phone;
    case email;

    public static function withOptions(): array
    {
        return [
            self::select->name,
        ];
    }

    public static function radioOptions(): array
    {
        return [
            1 => 'Muy rara vez',
            2 => 'Rara vez',
            3 => 'Algunas veces',
            4 => 'Frecuentemente',
            5 => 'Muy frecuentemente',
        ];
    }
}
