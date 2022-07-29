<?php

namespace App\Http\Livewire\Answers;

use App\Models\Dimension;
use Illuminate\Support\Facades\DB;
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
        //$average = Dimension::query()->sum('');

        return view('livewire.answers.results', [
            'results' => DB::table('answers as a')
                ->select('d.name as dimension')
                ->selectRaw('count(q.id) as min')
                ->selectRaw('sum("value") as your_score')
                ->join('questions as q', 'q.id', 'a.question_id')
                ->join('dimensions as d', 'd.id', 'q.dimension_id')
                ->where('a.participant_id', $this->participantId)
                ->groupBy('d.id')
                ->get()
                ->mapWithKeys(fn (\stdClass $row) => [
                    $row->dimension => [
                        'min' => $row->min,
                        'max' => $row->min * 5,
                        'your_score' => $row->your_score,
                    ]
                ]),
        ])->layout('layouts.guest');
    }
}
