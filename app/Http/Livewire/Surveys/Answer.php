<?php

namespace App\Http\Livewire\Surveys;

use App\Models\Question;
use App\Models\Survey;
use Illuminate\View\View;
use Livewire\Component;

class Answer extends Component
{
    public Survey $survey;

    public function render(): View
    {
        $this->survey->load('questions');
        return view('livewire.surveys.answer', [
            'participantQuestions' => Question::whereDoesntHave('dimension')->orderBy('number')->get(),
        ])
            ->layout('layouts.guest');
    }
}
