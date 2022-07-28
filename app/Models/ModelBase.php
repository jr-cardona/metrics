<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin \Eloquent
 */
class ModelBase extends Model
{
    public static function createMany(array $array)
    {
        foreach ($array as $item) {
            static::create($item);
        }
    }
}
