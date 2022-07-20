<?php

namespace App\Http\Livewire\Surveys;

use App\Models\Survey;
use Illuminate\View\View;

class Index extends \App\Http\Livewire\Components\Index
{
    public function render(): View
    {
        return view('livewire.surveys.index', [
            'surveys' => Survey::query()
                ->where('title', 'like', "%$this->search%")
                ->orderBy($this->sortField, $this->sortDesc ? 'desc' : 'asc')
                ->paginate($this->paginate, ['id', 'title', 'created_at', 'is_active']),
            'paginationOptions' => $this->paginationOptions,
            'createRoute' => route('surveys.create'),
            'createLabel' => __('New survey'),
        ]);
    }
}
