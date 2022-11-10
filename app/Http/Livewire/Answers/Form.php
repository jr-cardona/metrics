<?php

namespace App\Http\Livewire\Answers;

use App\Enums\QuestionCategories;
use App\Models\Answer;
use App\Models\Participant;
use App\Models\Survey;
use Illuminate\View\View;
use Livewire\Component;

class Form extends Component
{
    public Survey $survey;

    public int $currentStep;

    public int $totalSteps = 2;

    public array $questions = [];

    public function mount()
    {
        $this->currentStep = 1;

        $this->questions = $this->survey->questions()
            ->where('is_active', true)
            ->orderBy('number')
            ->get()
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
        $this->currentStep--;
    }

    public function submit()
    {
        $this->resetErrorBag();
        $this->validateData();

        $participant = Participant::create();

        foreach ($this->questions as $question) {
            if ($question['code'] === 'document') {
                $participant->update(['document' => $question['value']]);
            }

            Answer::create([
                'participant_id' => $participant->getKey(),
                'question_id' => $question['id'],
                'value' => $question['value'],
            ]);
        }

        $this->redirect(route('surveys.results', $this->survey));
    }

    public function validateData()
    {
        foreach ($this->questions as $id => $question) {
            if ($this->currentStep === 1 && $question['category'] !== QuestionCategories::participant->name) {
                continue;
            }

            if ($this->currentStep === 2 && $question['category'] !== QuestionCategories::survey->name) {
                continue;
            }

            $this->validate([
                "questions.$id.value" => 'required',
            ], attributes: [
                "questions.$id.value" => $question['title'],
            ]);
        }
    }
}
