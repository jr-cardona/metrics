<?php

namespace App\Http\Livewire\Dimensions;

use App\Http\Requests\DimensionSaveRequest;
use App\Models\Dimension;
use Illuminate\View\View;

class Form extends \App\Http\Livewire\Components\Form
{
    public Dimension $dimension;

    public function mount(Dimension $dimension)
    {
        $this->dimension = $dimension;
    }

    public function render(): View
    {
        return view('livewire.dimensions.form');
    }

    protected function rules(): array
    {
        return (new DimensionSaveRequest())->rules();
    }

    public function save()
    {
        $this->validate();

        $this->dimension->save();

        session()->flash('flash.banner', __('Dimension saved.'));

        $this->redirectRoute('dimensions.index');
    }
}
