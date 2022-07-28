<?php

namespace App\Http\Livewire\Questions;

use App\Http\Livewire\Surveys\Show;
use App\Models\Question;

class Form extends \App\Http\Livewire\Components\Form
{
    public bool $showModalForm = false;

    public ?Question $question = null;

    public ?int $surveyId = null;

    public function mount()
    {
        $this->question = new Question();
    }

    public function openQuestionModal(?int $id = null)
    {
        $this->resetValidation();
        $this->resetExcept('surveyId');

        $this->question = ($id) ? Question::find($id) : new Question();

        $this->showModalForm = true;
    }

    public function save()
    {
        $this->question->save();

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => __('Success') . '!',
            'text' => __('Question') . ' ' . __('saved'),
        ]);

        $this->resetExcept('surveyId');

        $this->emitTo(Show::getName(), 'questionUpdated');

        $this->showModalForm = false;
    }
}
