<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class Form extends Component
{
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
