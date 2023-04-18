<?php

namespace App\Http\Livewire\Surveys;

use App\Enums\QuestionCategories;
use App\Models\Participant;
use App\Models\Survey;
use Illuminate\View\View;

class Participants extends \App\Http\Livewire\Components\Index
{
    public Survey $survey;

    public function render(): View
    {
        $questions = $this->survey
            ->questions()
            ->where('category', QuestionCategories::participant->name)
            ->has('answers')
            ->pluck('title', 'id')
            ->all();

        $participants = Participant::query()
            ->withWhereHas(
                'answers',
                fn ($query) => $query->withWhereHas(
                    'question',
                    fn ($query) => $query
                        ->where('category', QuestionCategories::participant->name)
                        ->where('survey_id', $this->survey->id)
                )
            )
            ->get();

        return view('livewire.surveys.participants')->with([
            'participants' => $participants,
            'questions' => $questions,
        ]);
    }
}
