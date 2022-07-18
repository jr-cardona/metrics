<?php

namespace App\Presenters;

trait HasURLPresenter
{
    public function url(): URL
    {
        if (!isset($this->urlInstance)) {
            $this->urlInstance = new URL($this);
        }

        return $this->urlInstance;
    }
}
