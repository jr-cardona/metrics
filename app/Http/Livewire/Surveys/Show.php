<?php

namespace App\Http\Livewire\Surveys;

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
                    ->withWhereHas('dimension', fn ($query) => $query->where('code', 'IP'))
                    ->withPivot('number', 'is_active')
                    ->orderBy('number')
                    ->where('title', 'like', "%$this->searchParticipantQuestion%")
                    ->get(),
            'surveyQuestions' =>
                $this->survey->questions()
                    ->withWhereHas('dimension', fn ($query) => $query->where('code', '!=', 'IP'))
                    ->withPivot('number', 'is_active')
                    ->orderBy('number')
                    ->where('title', 'like', "%$this->searchSurveyQuestion")
                    ->get(),
        ]);
    }

    public function updateQuestionsOrder(array $list)
    {
        foreach ($list as $item) {
            $this->survey->questions()->updateExistingPivot($item['value'], ['number' => $item['order']]);
        }
    }
}
