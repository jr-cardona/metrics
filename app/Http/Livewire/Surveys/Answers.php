<?php

namespace App\Http\Livewire\Surveys;

use App\Models\Answer;
use App\Models\Dimension;
use App\Models\Participant;
use App\Models\Survey;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;

class Answers extends \App\Http\Livewire\Components\Index
{
    public Survey $survey;

    public Participant $participant;

    private Collection $dimensions;

    public function mount()
    {
        $this->survey = request()->route('survey');
        $this->participant = request()->route('participant');

        $this->dimensions = Dimension::query()
            ->withWhereHas('answers', function ($query) {
                $query->where('participant_id', $this->participant->getKey());
            })
            ->get();
    }

    public function render(): View
    {
        return view('livewire.surveys.answers')->with([
            'dimensions' => $this->dimensions,
        ]);
    }
}
