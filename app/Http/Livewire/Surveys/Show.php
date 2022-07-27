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
        return view('livewire.surveys.show', [
            'participantQuestions' => Question::query()->whereDoesntHave('dimension')->orderBy('number')->get(),
            'surveyQuestions' => $this->survey->questions()->orderBy('number')->with('dimension:id,name')->get(),
        ]);
    }

    public function updateQuestionsOrder(array $list)
    {
        foreach ($list as $item) {
            Question::find($item['value'])->update(['number' => $item['order']]);
        }
    }
}
