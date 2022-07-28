<?php

namespace App\Http\Livewire\Questions;

use App\Enums\QuestionCategories;
use App\Enums\QuestionTypes;
use App\Http\Requests\ParticipantQuestionSaveRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ParticipantForm extends Form
{
    protected $listeners = ['openParticipantModal'];

    public array $options = [];

    public function render(): View|string
    {
        if (!is_null($this->question)) {
            return view('livewire.questions.participant.form', [
                'types' => QuestionTypes::names(),
            ]);
        }

        return '';
    }

    public function openParticipantModal(?int $id = null)
    {
        parent::openQuestionModal($id);

        foreach ($this->question->options ?? [] as $option) {
            $this->options[] = [
                'value' => $option,
                'is_saved' => true,
            ];
        }
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
        $this->clearValidation();

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

        $this->question->options = collect($this->options)->pluck('value')->all();

        $this->validate();

        if (!$this->question->exists) {
            $this->question->number = DB::table('questions')
                ->where('category', QuestionCategories::participant->name)
                ->max('number') + 1;
            $this->question->category = QuestionCategories::participant->name;
        }

        parent::save();
    }

    protected function rules(): array
    {
        return (new ParticipantQuestionSaveRequest())->rules($this->question);
    }
}
