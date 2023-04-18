<?php

namespace App\Presenters;

trait HasURLPresenter
{
    public function url(): UrlPresenter
    {
        if (!isset($this->urlInstance)) {
            $this->urlInstance = new UrlPresenter($this);
        }

        return $this->urlInstance;
    }
}
