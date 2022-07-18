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
                ->where('name', 'like', "%$this->search%")
                ->orderBy($this->sortField, $this->sortDesc ? 'desc' : 'asc')
                ->paginate($this->paginate, ['id', 'name', 'created_at']),
            'paginationOptions' => range(start: 10, end: 100, step: 10),
            'createRoute' => route('dimensions.create'),
            'createLabel' => __('New dimension'),
        ]);
    }
}
