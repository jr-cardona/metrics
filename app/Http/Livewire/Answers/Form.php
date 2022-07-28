<?php

namespace App\Http\Livewire\Answers;

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

        $this->participantQuestions = $this->survey->questions()
            ->whereHas('dimension', fn ($query) => $query->where('code', 'IP'))
            ->withPivot('id', 'number')
            ->where('is_active', true)
            ->orderBy('number')
            ->get(['type', 'title', 'number', 'options'])
            ->toArray();

        $this->surveyQuestions = $this->survey->questions()
            ->whereHas('dimension', fn ($query) => $query->where('code', '!=', 'IP'))
            ->withPivot('id', 'number')
            ->where('is_active', true)
            ->orderBy('number')
            ->get(['type', 'title', 'number', 'options'])
            ->toArray();
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

    public function validateData()
    {
        if ($this->currentStep === 1) {
            foreach ($this->participantQuestions as $index => $question) {
                $this->validate([
                    "participantQuestions.$index.pivot.{$question['pivot']['id']}" => 'required',
                ], attributes: [
                    "participantQuestions.$index.pivot.{$question['pivot']['id']}" => $question['title'],
                ]);
            }
        }

        if ($this->currentStep === 2) {
            foreach ($this->surveyQuestions as $index => $question) {
                $this->validate([
                    "surveyQuestions.$index.pivot.{$question['pivot']['id']}" => 'required',
                ], attributes: [
                    "surveyQuestions.$index.pivot.{$question['pivot']['id']}" => $question['title'],
                ]);
            }
        }
    }
}
