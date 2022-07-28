<?php

namespace App\Enums;

enum QuestionCategories
{
    use AsArrayTrait;

    case survey;
    case participant;
}
