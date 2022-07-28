<?php

namespace App\Http\Livewire\Answers;

use App\Enums\QuestionCategories;
use App\Models\Question;
use App\Models\Survey;
use Illuminate\View\View;
use Livewire\Component;

class Form extends Component
{
    public Survey $survey;

    public int $currentStep;

    public int $totalSteps = 2;

    public array $participantQuestions = [];

    public array $surveyQuestions = [];

    public function mount()
    {
        $this->currentStep = 1;

        $this->participantQuestions = Question::query()
            ->where('is_active', true)
            ->where('category', QuestionCategories::participant->name)
            ->orderBy('number')
            ->get(['id', 'type', 'title', 'number', 'options'])
            ->mapWithKeys(fn (Question $question) => [$question->getKey() => [
                'title' => $question->title,
                'number' => $question->number,
                'type' => $question->type,
                'options' => $question->options,
            ]])
            ->all();

        $this->surveyQuestions = $this->survey->questions()
            ->where('is_active', true)
            ->where('category', QuestionCategories::survey->name)
            ->orderBy('number')
            ->get(['id', 'title', 'number'])
            ->mapWithKeys(fn (Question $question) => [$question->getKey() => [
                'title' => $question->title,
                'number' => $question->number,
            ]])
            ->all();
    }

    public function render(): View
    {
        return view('livewire.surveys.answer')->layout('layouts.guest');
    }

    public function increaseStep()
    {
        $this->resetErrorBag();
        $this->validateData();
        $this->currentStep++;
    }

    public function decreaseStep()
    {
        $this->resetErrorBag();
        $this->validateData();
        $this->currentStep--;
    }

    public function submit()
    {
        $this->resetErrorBag();
        $this->validateData();

        dd($this->participantQuestions);

        $this->redirect(route('answers.results'));
    }

    public function validateData()
    {
        if ($this->currentStep === 1) {
            foreach ($this->participantQuestions as $id => $question) {
                $this->validate([
                    "participantQuestions.$id.value" => 'required',
                ], attributes: [
                    "participantQuestions.$id.value" => $question['title'],
                ]);
            }
        }

        if ($this->currentStep === 2) {
            foreach ($this->surveyQuestions as $id => $question) {
                $this->validate([
                    "surveyQuestions.$id.value" => 'required',
                ], attributes: [
                    "surveyQuestions.$id.value" => $question['title'],
                ]);
            }
        }
    }
}
