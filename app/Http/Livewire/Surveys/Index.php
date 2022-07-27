<?php

namespace App\Http\Livewire\Surveys;

use App\Models\Survey;
use App\ViewModels\Surveys\SurveyIndexViewModel;
use Illuminate\View\View;

class Index extends \App\Http\Livewire\Components\Index
{
    public $listeners = ['questionUpdated' => 'render'];

    public function render(): View
    {
        $viewModel = new SurveyIndexViewModel();

        $surveys = Survey::query()
            ->select(['id', 'title', 'created_at', 'is_active'])
            ->where('title', 'like', "%$this->search%")
            ->orderBy($this->sortField, $this->sortDesc ? 'desc' : 'asc')
            ->paginate($this->paginate);

        return view('livewire.surveys.index', $viewModel->collection(['surveys' => $surveys]));
    }
}
