<?php

namespace App\Http\Livewire\Questions;

use App\Models\Question;
use Illuminate\View\View;
use Livewire\Component;

class Toggle extends Component
{
    public int $modelId;

    public string $field;

    public bool $isActive;

    public function render(): View
    {
        return view('livewire.components.toggle');
    }

    public function updatingIsActive(string $value)
    {
        Question::find($this->modelId)->setAttribute($this->field, (bool) $value)->save();
    }
}
