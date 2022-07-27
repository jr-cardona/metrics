<?php

namespace App\Http\Livewire\Surveys;

use App\Models\Survey;
use Illuminate\View\View;
use Livewire\Component;

class Toggle extends Component
{
    public $survey;

    public string $field;

    public bool $isActive;

    public function mount(Survey $survey)
    {
        $this->survey = $survey;
        $this->isActive = (bool) $this->survey->getAttribute($this->field);
    }

    public function render(): View
    {
        return view('livewire.components.toggle');
    }

    public function updatingIsActive(string $value)
    {
        $this->survey->setAttribute($this->field, (bool) $value)->save();
    }
}
