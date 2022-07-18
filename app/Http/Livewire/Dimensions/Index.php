<?php

namespace App\Http\Livewire\Dimensions;

use App\Http\Livewire\Components\IndexComponent;
use App\Models\Dimension;
use Illuminate\View\View;

class Index extends IndexComponent
{
    public function render(): View
    {
        return view('livewire.dimensions.index', [
            'dimensions' => Dimension::query()
                ->where('name', 'like', "%$this->search%")
                ->orderBy($this->sortField, $this->sortDesc ? 'desc' : 'asc')
                ->paginate($this->paginate, ['id', 'name', 'created_at']),
            'paginationOptions' => range(start: 10, end: 100, step: 10),
        ]);
    }
}
