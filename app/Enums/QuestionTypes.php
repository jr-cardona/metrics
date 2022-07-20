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
}
