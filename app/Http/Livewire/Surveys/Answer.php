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
            'participantQuestions' =>
                $this->survey->questions()
                    ->withWhereHas('dimension', fn ($query) => $query->where('code', 'IP'))
                    ->withPivot('number', 'is_active')
                    ->orderBy('number')
                    ->get(),
            'surveyQuestions' =>
                $this->survey->questions()
                    ->withWhereHas('dimension', fn ($query) => $query->where('code', '!=', 'IP'))
                    ->withPivot('number', 'is_active')
                    ->orderBy('number')
                    ->get(),
        ])
            ->layout('layouts.guest');
    }
}
