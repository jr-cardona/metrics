<?php

namespace App\Http\Livewire\Answers;

use Livewire\Component;

class Results extends Component
{
    public int $surveyId;

    public function mount(): void
    {
        $this->surveyId = request()->route('survey');
    }

    public function render()
    {
        return view('livewire.answers.results')->layout('layouts.guest');
    }
}
