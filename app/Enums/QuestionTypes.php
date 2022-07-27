<?php

namespace App\Enums;

enum QuestionTypes
{
    use AsArrayTrait;

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

    public static function withOptions(): array
    {
        return [
            self::checkbox->name,
            self::select->name,
            self::radio->name,
        ];
    }
}
