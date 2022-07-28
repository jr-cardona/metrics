<?php

namespace App\Http\Livewire\Questions;

use App\Models\Question;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Livewire\Component;

class Toggle extends Component
{
    public int $questionId;

    public string $field;

    public bool $isActive;

    public function render(): View
    {
        return view('livewire.components.toggle');
    }

    public function updatingIsActive(string $value)
    {
        Question::find($this->questionId)->setAttribute($this->field, (bool) $value)->save();
    }
}
