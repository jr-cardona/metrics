<?php

namespace App\Http\Livewire\Questions;

class Toggle extends \App\Http\Livewire\Components\Toggle
{
    public int $surveyId;

    public function mount()
    {
        $this->isActive = $this->model->pivot->{$this->field};
    }

    public function updatingIsActive(string $value)
    {
        $this->model->surveys()->updateExistingPivot($this->surveyId, [$this->field => (bool) $value]);
    }
}
