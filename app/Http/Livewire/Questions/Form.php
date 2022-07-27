<?php

namespace App\Http\Livewire\Questions;

use App\Enums\QuestionTypes;
use App\Http\Livewire\Surveys\Index;
use App\Http\Requests\QuestionSaveRequest;
use App\Models\Dimension;
use App\Models\Question;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class Form extends \App\Http\Livewire\Components\Form
{
    protected $listeners = ['openQuestionModal'];

    public bool $showModalForm = false;

    public Question $question;

    public int $surveyId;

    public bool $isParticipantQuestion = false;

    public function mount()
    {
        $this->question = new Question();
    }

    public function render(): View
    {
        return view('livewire.questions.form', [
            'dimensions' => Dimension::where('code', '!=', 'IP')
                ->pluck('name', 'id')
                ->all(),
            'types' => QuestionTypes::names(),
        ]);
    }

    public function openQuestionModal(?int $id = null, ?string $dimensionCode = null)
    {
        $this->resetValidation();

        $this->question = ($id) ? Question::find($id) : new Question();

        if ($dimensionCode) {
            $this->isParticipantQuestion = true;
            $this->question->dimension_id = Dimension::where('code', $dimensionCode)->value('id');
        }

        $this->showModalForm = true;
    }

    public function save()
    {
        $this->validate();

        $isNew = !$this->question->exists;
        $this->question->save();

        if ($isNew) {
            $lastNumber = DB::table('question_survey')
                ->where('survey_id', $this->surveyId)
                ->join('questions', 'questions.id', 'question_id')
                ->join('dimensions', 'dimensions.id', 'questions.dimension_id')
                ->when($this->isParticipantQuestion, fn ($query) => $query->where('dimensions.code', 'IP'))
                ->max('number');

            $this->question->surveys()->attach($this->surveyId, ['number' => $lastNumber + 1]);
        }

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Success!',
            'text' => __('Question') . ' ' . ($isNew ? __('created') : __('updated')),
        ]);

        $this->question = new Question();

        $this->emitTo(Index::getName(), 'questionUpdated');

        $this->showModalForm = false;
    }

    protected function rules(): array
    {
        return (new QuestionSaveRequest())->rules($this->question);
    }
}
