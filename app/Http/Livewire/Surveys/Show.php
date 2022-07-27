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
        $questions = $this->survey->questions()
            ->with('dimension')
            ->withPivot('number', 'is_active')
            ->orderBy('number')
            ->get();

        return view('livewire.surveys.show', [
            'participantQuestions' => $questions->filter(fn (Question $question) => $question->dimension->code === 'IP'),
            'surveyQuestions' => $questions->filter(fn (Question $question) => $question->dimension->code !== 'IP'),
        ]);
    }

    public function updateQuestionsOrder(array $list)
    {
        foreach ($list as $item) {
            $this->survey->questions()->updateExistingPivot($item['value'], ['number' => $item['order']]);
        }
    }
}
