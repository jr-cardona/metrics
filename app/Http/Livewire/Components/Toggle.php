<?php

namespace App\Http\Livewire\Components;

use Illuminate\Database\Eloquent\Model;
use Illuminate\View\View;
use Livewire\Component;

class Toggle extends Component
{
    public Model $model;

    public string $field;

    public bool $isActive;

    public function mount()
    {
        $this->isActive = (bool) $this->model->getAttribute($this->field);
    }

    public function render(): View
    {
        return view('livewire.components.toggle');
    }

    public function updating(string $field, string $value)
    {
        $this->model->setAttribute($this->field, (bool) $value)->save();
    }
}
