<?php

namespace App\Http\Livewire\Questions;

use App\Http\Requests\QuestionSaveRequest;
use App\Models\Question;
use Illuminate\View\View;

class Form extends \App\Http\Livewire\Components\Form
{
    public Question $question;

    public function mount(Question $question)
    {
        $this->question = $question;
    }

    public function render(): View
    {
        return view('livewire.questions.form');
    }

    public function save()
    {
        $this->validate();

        $this->question->save();

        session()->flash('flash.banner', __('Question saved.'));

        $this->redirectRoute('questions.index');
    }

    protected function rules(): array
    {
        return (new QuestionSaveRequest())->rules();
    }
}
