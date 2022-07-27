<?php

namespace App\Http\Livewire\Questions;

use App\Enums\QuestionTypes;
use App\Http\Requests\QuestionSaveRequest;
use App\Models\Dimension;
use App\Models\Question;
use Illuminate\View\View;

class Form extends \App\Http\Livewire\Components\Form
{
    protected $listeners = ['openCreateModal', 'openEditModal'];

    public bool $showModalForm = false;

    public Question $question;

    public function mount()
    {
        $this->question = new Question();
    }

    public function render(): View
    {
        return view('livewire.questions.form', [
            'dimensions' => Dimension::pluck('name', 'id')->all(),
            'types' => QuestionTypes::names(),
        ]);
    }

    public function openCreateModal()
    {
        $this->resetValidation();
        $this->question = new Question();
        $this->showModalForm = true;
    }

    public function openEditModal(int $id)
    {
        $this->resetValidation();
        $this->question = Question::find($id);
        $this->showModalForm = true;
    }

    public function save()
    {
        $this->validate();

        $this->question->number = $this->question->getLastNumber() + 1;

        $this->question->save();

        $this->dispatchBrowserEvent('event-notification', [
            'eventName' => 'Question saved!',
            'eventMessage' => 'Question updated!'
        ]);

        $this->redirect($this->question->dimension->survey->url()->show());
    }

    protected function rules(): array
    {
        return (new QuestionSaveRequest())->rules($this->question);
    }
}
