<?php

namespace App\Http\Livewire\Surveys;

use App\Enums\QuestionTypes;
use App\Http\Requests\QuestionSaveRequest;
use App\Models\Dimension;
use App\Models\Question;
use App\Models\Survey;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;
use Livewire\Component;

class Show extends Component
{
    public Survey $survey;

    public bool $showModalForm = false;

    public ?Question $question = null;

    public ?string $title = '';

    public ?string $type = '';

    public ?array $options = [];

    public ?int $dimension_id = null;

    public bool $isSurveyQuestion = true;

    public function rules(): array
    {
        return (new QuestionSaveRequest())->rules();
    }

    public function render(): View
    {
        return view('livewire.surveys.show', [
            'participantQuestions' => Question::query()->whereDoesntHave('dimension')->orderBy('number')->get(),
            'surveyQuestions' => $this->survey->questions()->orderBy('number')->with('dimension:id,name')->get(),
            'dimensions' => Dimension::select(['id', 'name'])->get(),
            'types' => QuestionTypes::names(),
        ]);
    }

    public function updateQuestionsOrder(array $list)
    {
        foreach ($list as $item) {
            Question::find($item['value'])->update(['number' => $item['order']]);
        }
    }

    public function openQuestionModal(?int $id = null, bool $isSurveyQuestion = true)
    {
        $this->resetValidation();
        $this->question = ($id) ? Question::find($id) : new Question();
        $this->title = $this->question->title;
        $this->type = $this->question->type;
        $this->options = $this->question->options;
        $this->dimension_id = $this->question->dimension_id;
        $this->isSurveyQuestion = $isSurveyQuestion;
        $this->showModalForm = true;
    }

    public function save()
    {
        $this->validate();

        $this->question->title = $this->title;
        $this->question->type = $this->type;
        $this->question->options = $this->options;
        $this->question->dimension_id = $this->dimension_id;
        if ($this->isSurveyQuestion) {
            $lastNumber = $this->survey->questions()
                ->orderBy('number', 'desc')
                ->value('number');
        } else {
            $lastNumber = Question::whereDoesntHave('dimension')
                ->orderBy('number', 'desc')
                ->value('number');
        }
        $this->question->number = $lastNumber + 1;
        $this->question->save();

        $this->dispatchBrowserEvent('event-notification', [
            'eventName' => 'Question saved!',
            'eventMessage' => 'Question updated!'
        ]);

        $this->showModalForm = false;
    }
}
