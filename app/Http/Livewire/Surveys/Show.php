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
        $this->survey->load('dimensions.questions');
        return view('livewire.surveys.show');
    }

    public function toggleEnabled(Question $question)
    {
        $question->is_active = !$question->is_active;
        $question->save();
    }
}
