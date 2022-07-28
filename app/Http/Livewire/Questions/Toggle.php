<?php

namespace App\Http\Livewire\Questions;

use App\Models\Question;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Livewire\Component;

class Toggle extends Component
{
    public $question;

    public string $field;

    public bool $isActive;

    public function mount(Question $question)
    {
        $this->question = $question;
        $this->isActive = (bool) $this->question->getAttribute($this->field);
    }

    public function render(): View
    {
        return view('livewire.components.toggle');
    }

    public function updatingIsActive(string $value)
    {
        $this->question->setAttribute($this->field, (bool) $value)->save();
    }
}
