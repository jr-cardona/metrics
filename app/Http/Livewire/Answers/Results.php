<?php

namespace App\Http\Livewire\Answers;

use Livewire\Component;

class Results extends Component
{
    public int $participantId;

    public function mount()
    {
        $this->participantId = request()->route('participant');
    }

    public function render()
    {
        return view('livewire.answers.results')->layout('layouts.guest');
    }
}
