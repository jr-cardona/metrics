<?php

namespace App\Http\Livewire\Surveys;

use App\Models\Participant;
use App\Models\Survey;
use Illuminate\View\View;

class Answers extends \App\Http\Livewire\Components\Index
{
    public Survey $survey;

    public Participant $participant;

    public function mount()
    {
        $this->survey = request()->route('survey');
        $this->participant = request()->route('participant');
    }

    public function render(): View
    {
        return view('livewire.surveys.answers');
    }
}
