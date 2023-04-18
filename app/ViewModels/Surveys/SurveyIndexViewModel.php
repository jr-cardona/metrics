<?php

namespace App\ViewModels\Surveys;

use App\ViewModels\IndexViewModel;

class SurveyIndexViewModel extends IndexViewModel
{
    protected function createRoute(): string
    {
        return route('surveys.create');
    }

    protected function createLabel(): string
    {
        return __('Create') . ' ' . __('survey');
    }
}
