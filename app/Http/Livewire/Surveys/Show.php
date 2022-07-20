<?php

namespace App\Http\Livewire\Surveys;

use App\Models\Question;
use App\Models\Survey;
use Illuminate\View\View;
use Livewire\Component;

class Show extends Component
{
    public Survey $survey;

    public function render(): View
    {
        $participantQuestions = Question::query()->whereDoesntHave('dimension')->get();
        $surveyQuestions = $this->survey->questions()->with('dimension:id,name')->orderBy('number')->get();
        return view('livewire.surveys.show', compact('participantQuestions', 'surveyQuestions'));
    }
}
