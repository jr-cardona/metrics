<?php

namespace App\Http\Livewire\Surveys;

use App\Http\Requests\SurveySaveRequest;
use App\Models\Survey;
use Illuminate\View\View;
use Livewire\Component;

class Form extends Component
{
    public Survey $survey;

    public function mount(Survey $survey)
    {
        $this->survey = $survey;
    }

    public function render(): View
    {
        return view('livewire.surveys.form');
    }

    protected function rules(): array
    {
        return (new SurveySaveRequest())->rules();
    }

    public function save()
    {
        $this->validate();

        $this->survey->save();

        session()->flash('flash.banner', __('Survey saved.'));

        $this->redirectRoute('surveys.index');
    }
}
