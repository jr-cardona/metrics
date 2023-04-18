<?php

namespace App\Http\Livewire\Questions;

use App\Enums\QuestionCategories;
use App\Http\Requests\SurveyQuestionSaveRequest;
use App\Models\Dimension;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class SurveyForm extends Form
{
    protected $listeners = ['openSurveyModal'];

    public function render(): View|string
    {
        if (!is_null($this->question)) {
            return view('livewire.questions.survey.form', [
                'dimensions' => Dimension::pluck('name', 'id')->all(),
            ]);
        }

        return '';
    }

    public function openSurveyModal(?int $id = null)
    {
        parent::openQuestionModal($id);
    }

    public function save()
    {
        $this->validate();

        if (!$this->question->exists) {
            $this->question->number = DB::table('questions')
                ->where('survey_id', $this->surveyId)
                ->max('number') + 1;
            $this->question->survey_id = $this->surveyId;
            $this->question->category = QuestionCategories::survey->name;
        }

        parent::save();
    }

    protected function rules(): array
    {
        return (new SurveyQuestionSaveRequest())->rules();
    }
}
