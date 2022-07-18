<?php

namespace App\Http\Livewire\Questions;

use App\Models\Question;
use Illuminate\View\View;

class Index extends \App\Http\Livewire\Components\Index
{
    public ?string $sortField = 'number';

    public function render(): View
    {
        return view('livewire.questions.index', [
            'questions' => Question::query()
                ->with('dimension:id,name')
                ->where('title', 'like', "%$this->search%")
                ->orderBy($this->sortField, $this->sortDesc ? 'desc' : 'asc')
                ->paginate($this->paginate, [
                    'id',
                    'number',
                    'title',
                    'created_at',
                    'is_active',
                    'dimension_id',
                ]),
            'paginationOptions' => range(start: 10, end: 100, step: 10),
            'createRoute' => route('questions.create'),
            'createLabel' => __('New question'),
        ]);
    }
}
