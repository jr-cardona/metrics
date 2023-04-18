<?php

namespace App\Http\Livewire\Surveys;

use App\Models\Survey;
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
        Survey::find($this->modelId)->setAttribute($this->field, (bool) $value)->save();
    }
}
