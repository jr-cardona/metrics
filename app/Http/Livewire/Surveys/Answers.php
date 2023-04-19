<?php

namespace App\Http\Livewire\Surveys;

use App\Models\Dimension;
use App\Models\Participant;
use App\Models\Survey;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;

class Answers extends \App\Http\Livewire\Components\Index
{
    public Survey $survey;

    public Participant $participant;

    private Collection $dimensions;

    private array $dimensionNames;

    private array $dimensionMinScores;

    private array $dimensionMaxScores;

    private array $dimensionObtainedScores;

    public function mount()
    {
        $this->survey = request()->route('survey');
        $this->participant = request()->route('participant');

        $this->dimensions = Dimension::query()
            ->withWhereHas('answers', function ($query) {
                $query
                    ->with('question:id,number')
                    ->where('participant_id', $this->participant->getKey())
                    ->select(['value', 'question_id']);
            })
            ->get();

        $this->dimensionNames = $this->dimensions->pluck('name')->all();
        $this->dimensions->each(function (Dimension $dimension) {
            $this->dimensionMinScores[] = $dimension->answers->count();
            $this->dimensionObtainedScores[] = $dimension->answers->sum('value');
            $this->dimensionMaxScores[] = $dimension->answers->count() * 5;
        })->all();
    }

    public function render(): View
    {
        return view('livewire.surveys.answers')->with([
            'dimensions' => $this->dimensions,
            'dimensionNames' => $this->dimensionNames,
            'dimensionMinScores' => $this->dimensionMinScores,
            'dimensionObtainedScores' => $this->dimensionObtainedScores,
            'dimensionMaxScores' => $this->dimensionMaxScores,
        ]);
    }
}
