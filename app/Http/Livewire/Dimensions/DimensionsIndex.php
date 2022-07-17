<?php

namespace App\Http\Livewire\Dimensions;

use App\Models\Dimension;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class DimensionsIndex extends Component
{
    use WithPagination;

    public string $search = '';

    public string $sortField = 'created_at';

    public bool $sortDesc = true;

    public function render(): View
    {
        return view('livewire.dimensions.index', [
            'dimensions' => Dimension::query()
                ->where('name', 'like', "%$this->search%")
                ->orderBy($this->sortField, $this->sortDesc ? 'desc' : 'asc')
                ->paginate(10)
        ]);
    }

    public function sortBy(string $field)
    {
        if ($this->sortField === $field) {
            $this->sortDesc = !$this->sortDesc;
            return;
        }

        $this->sortDesc = true;
        $this->sortField = $field;
    }
}
