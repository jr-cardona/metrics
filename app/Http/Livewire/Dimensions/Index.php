<?php

namespace App\Http\Livewire\Dimensions;

use App\Models\Dimension;
use Illuminate\View\View;

class Index extends \App\Http\Livewire\Components\Index
{
    public function render(): View
    {
        return view('livewire.dimensions.index', [
            'dimensions' => Dimension::query()
                ->with('survey:id,title')
                ->where('name', 'like', "%$this->search%")
                ->orderBy($this->sortField, $this->sortDesc ? 'desc' : 'asc')
            'paginationOptions' => range(start: 10, end: 100, step: 10),
                ->paginate($this->paginate, ['id', 'name', 'created_at', 'survey_id']),
            'createRoute' => route('dimensions.create'),
            'createLabel' => __('New dimension'),
        ]);
    }
}
