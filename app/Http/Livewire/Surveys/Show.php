<?php

namespace App\Http\Livewire\Surveys;

use App\Enums\QuestionCategories;
use App\Models\Question;
use App\Models\Survey;
use Illuminate\View\View;
use Livewire\Component;

class Show extends Component
{
    public Survey $survey;

    public $listeners = ['questionUpdated' => 'render', 'deleted' => 'render'];

    public ?string $searchParticipantQuestion = '';

    public ?string $searchSurveyQuestion = '';

    public function render(): View
    {
        return view('livewire.surveys.show', [
            'participantQuestions' =>
                $this->survey->questions()
                    ->where('category', QuestionCategories::participant->name)
                    ->where('title', 'like', "%$this->searchParticipantQuestion%")
                    ->orderBy('number')
                    ->get(),
            'surveyQuestions' =>
                $this->survey->questions()
                    ->with('dimension')
                    ->where('category', QuestionCategories::survey->name)
                    ->where('title', 'like', "%$this->searchSurveyQuestion%")
                    ->orderBy('number')
                    ->get(),
        ]);
    }

    public function updateQuestionsOrder(array $list)
    {
        foreach ($list as $item) {
            Question::find($item['value'])->update(['number' => $item['order']]);
        }
    }
}
