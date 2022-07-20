<?php

namespace App\Http\Livewire\Questions;

use App\Models\Question;
use App\ViewModels\Questions\QuestionIndexViewModel;
use Illuminate\View\View;

class Index extends \App\Http\Livewire\Components\Index
{
    public ?string $sortField = 'dimension_id';

    public function render(): View
    {
        $viewModel = new QuestionIndexViewModel();

        $questions = Question::query()
            ->select(['id', 'title', 'is_active', 'dimension_id'])
            ->with('dimension:id,name')
            ->where('title', 'like', "%$this->search%")
            ->orderBy($this->sortField, $this->sortDesc ? 'desc' : 'asc')
            ->paginate($this->paginate);

        return view('livewire.questions.index', $viewModel->collection(['questions' => $questions]));
    }
}
