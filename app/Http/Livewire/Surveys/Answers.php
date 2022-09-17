<?php

namespace App\Http\Livewire\Surveys;

use Illuminate\View\View;

class Answers extends \App\Http\Livewire\Components\Index
{
    public int $surveyId;

    public function mount()
    {
        $this->surveyId = request()->route('survey');
    }

    public function render(): View
    {
        return view('livewire.surveys.answers');
    }
}
