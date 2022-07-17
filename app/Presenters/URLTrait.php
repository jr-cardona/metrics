<?php

namespace App\Presenters;

trait URLTrait
{
    public function url(): URL
    {
        if (!isset($this->urlInstance)) {
            $this->urlInstance = new URL($this);
        }

        return $this->urlInstance;
    }
}
