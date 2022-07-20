<?php

namespace App\Presenters;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class UrlPresenter
{
    public function __construct(protected Model $model)
    {
    }

    public function __call(string $name, array $arguments)
    {
        return $this->url($name);
    }

    public function url(string $action): string
    {
        $routeName = Str::of(class_basename($this->model))->lower()->append('s')->value();

        return route("$routeName.$action", $this->model);
    }
}
