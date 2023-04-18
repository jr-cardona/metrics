<?php

namespace App\Http\Livewire\Surveys;

use App\Models\Answer;
use App\Models\Participant;
use App\Models\Survey;
use Illuminate\View\View;

class Answers extends \App\Http\Livewire\Components\Index
{
    public Survey $survey;

    public Participant $participant;

    private mixed $physicalAggressionScore;
    private mixed $verbalAggressionScore;
    private mixed $rageScore;
    private mixed $hostilityScore;

    public function mount()
    {
        $this->survey = request()->route('survey');
        $this->participant = request()->route('participant');

        $this->physicalAggressionScore = $this->participant->answers()
            ->whereIn('question_id', [1, 4, 8, 15, 19, 22, 25])
            ->sum('value');

        $this->verbalAggressionScore = $this->participant->answers()
            ->whereIn('question_id', [5, 9, 12, 16])
            ->sum('value');

        $this->rageScore = $this->participant->answers()
            ->whereIn('question_id', [2, 6, 10, 13, 17, 20 ,23])
            ->sum('value');

        $this->hostilityScore = $this->participant->answers()
            ->whereIn('question_id', [3, 7, 11, 14, 18, 21, 24, 26])
            ->sum('value');
    }

    public function render(): View
    {
        return view('livewire.surveys.answers')->with([
            'physicalAggressionScore' => $this->physicalAggressionScore,
            'verbalAggressionScore' => $this->verbalAggressionScore,
            'rageScore' => $this->rageScore,
            'hostilityScore' => $this->hostilityScore,
        ]);
    }
}
