<?php

namespace App\Http\Livewire\Questions;

use App\Models\Question;
use Illuminate\View\View;
use Livewire\Component;

class Toggle extends Component
{
    public int $surveyId;

    public $question;

    public string $field;

    public bool $isActive;

    public function mount(Question $question)
    {
        $this->question = $question;
        $this->isActive = $this->question->surveys()->whereKey($this->surveyId)->first()->pivot->{$this->field};
    }

    public function render(): View
    {
        return view('livewire.components.toggle');
    }

    public function updatingIsActive(string $value)
    {
        $this->question->surveys()->updateExistingPivot($this->surveyId, [$this->field => (bool) $value]);
    }
}
