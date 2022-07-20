<?php

namespace App\Enums;

enum DocumentTypes: string
{
    use AsArrayTrait;

    case CC = 'Cédula de ciudadanía';
    case TI = 'Tarjeta de identidad';
    case CE = 'Cédula de extranjería';
    case PPN = 'Pasaporte';
    case RC = 'Registro de nacimiento';
    case LIC = 'Licencia de conducir';
}
