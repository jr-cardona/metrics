<?php

namespace App\Http\Livewire\Questions;

use App\Enums\QuestionTypes;
use App\Http\Livewire\Surveys\Show;
use App\Http\Requests\QuestionSaveRequest;
use App\Models\Dimension;
use App\Models\Question;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class Form extends \App\Http\Livewire\Components\Form
{
    protected $listeners = ['openQuestionModal'];

    public bool $showModalForm = false;

    public ?Question $question = null;

    public ?int $surveyId = null;

    public bool $isParticipantQuestion = false;

    public array $options = [];

    public function mount()
    {
        $this->question = new Question();
    }

    public function render(): View|string
    {
        if (!is_null($this->question)) {
            return view('livewire.questions.form', [
                'dimensions' => Dimension::where('code', '!=', 'IP')
                    ->pluck('name', 'id')
                    ->all(),
                'types' => QuestionTypes::names(),
            ]);
        }

        return '';
    }

    public function openQuestionModal(?int $id = null, ?string $dimensionCode = null)
    {
        $this->resetValidation();
        $this->resetExcept('surveyId');

        $this->question = ($id) ? Question::find($id) : new Question();

        if ($dimensionCode) {
            $this->isParticipantQuestion = true;
            $this->question->dimension_id = Dimension::where('code', $dimensionCode)->value('id');
        } else {
            $this->isParticipantQuestion = false;
        }

        foreach ($this->question->options as $option) {
            $this->options[] = [
                'value' => $option,
                'is_saved' => true,
            ];
        }

        $this->showModalForm = true;
    }

    public function addOption()
    {
        foreach ($this->options as $key => $option) {
            if (!$option['is_saved']) {
                $this->addError('options.' . $key, __('This line must been saved before creating a new one.'));
                return;
            }
        }

        $this->options[] = [
            'value' => '',
            'is_saved' => false,
        ];
    }

    public function editOption(int $index)
    {
        $this->clearValidation();

        foreach ($this->options as $key => $option) {
            if (!$option['is_saved']) {
                $this->addError('options.' . $key, __('This line must been saved before creating a new one.'));
                return;
            }
        }

        $this->options[$index]['is_saved'] = false;
    }

    public function saveOption(int $index)
    {
        if (empty($this->options[$index]['value'])) {
            $this->addError('options.' . $index, __('This field is required.'));
            return;
        }

        $this->options[$index]['is_saved'] = true;
    }

    public function removeOption(int $index)
    {
        unset($this->options[$index]);
    }

    public function save()
    {
        foreach ($this->options as $key => $option) {
            if (!$option['is_saved']) {
                $this->addError('options.' . $key, __('Please save all the options before save this question.'));
                return;
            }
        }

        $isNew = !$this->question->exists;
        $this->question->options = collect($this->options)->pluck('value')->all();
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

        $this->resetExcept('surveyId');

        $this->emitTo(Show::getName(), 'questionUpdated');

        $this->showModalForm = false;
    }

    protected function rules(): array
    {
        return (new QuestionSaveRequest())->rules($this->question);
    }
}
