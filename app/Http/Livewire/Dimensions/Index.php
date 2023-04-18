<?php

namespace App\Http\Livewire\Dimensions;

use App\Models\Dimension;
use App\ViewModels\Dimensions\DimensionIndexViewModel;
use Illuminate\View\View;

class Index extends \App\Http\Livewire\Components\Index
{
    public $listeners = ['deleted' => 'render'];

    public function render(): View
    {
        $viewModel = new DimensionIndexViewModel();

        $dimensions = Dimension::query()
            ->select(['id', 'name', 'description', 'created_at'])
            ->where('name', 'like', "%$this->search%")
            ->orderBy($this->sortField, $this->sortDesc ? 'desc' : 'asc')
            ->paginate($this->paginate);

        return view('livewire.dimensions.index', $viewModel->collection(['dimensions' => $dimensions]));
    }
}
