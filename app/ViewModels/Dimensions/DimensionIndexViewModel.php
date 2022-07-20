<?php

namespace App\ViewModels\Dimensions;

use App\ViewModels\IndexViewModel;

class DimensionIndexViewModel extends IndexViewModel
{
    protected function createRoute(): string
    {
        return route('dimensions.create');
    }

    protected function createLabel(): string
    {
        return __('New dimension');
    }
}
