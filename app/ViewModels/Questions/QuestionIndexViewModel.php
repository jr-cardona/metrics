<?php

namespace App\ViewModels\Questions;

use App\ViewModels\IndexViewModel;

class QuestionIndexViewModel extends IndexViewModel
{
    protected function createRoute(): string
    {
        return route('questions.create');
    }

    protected function createLabel(): string
    {
        return __('New question');
    }
}
