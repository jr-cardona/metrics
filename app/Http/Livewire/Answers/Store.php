<?php

namespace App\Http\Livewire\Answers;

use App\Models\Participant;
use Livewire\Component;

class Store extends Component
{
    public Participant $participant;

    public function render()
    {
        return view('livewire.answers.results')->layout('layouts.guest');
    }
}
