<?php

namespace App\Http\Livewire\Dimensions;

use App\Models\Dimension;
use Illuminate\View\View;
use Livewire\Component;

class Show extends Component
{
    public Dimension $dimension;

    public function render(): View
    {
        return view('livewire.dimensions.show');
    }
}
