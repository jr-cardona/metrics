<?php

namespace App\Http\Livewire\Dimensions;

use App\Models\Dimension;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class DimensionsForm extends Component
{
    use WithFileUploads;

    public Dimension $dimension;

    public function render(): View
    {
        return view('livewire.dimensions.form');
    }

    protected function rules(): array
    {
        return [
            'dimension.name' => ['required', 'string'],
        ];
    }

    public function mount(Dimension $dimension)
    {
        $this->dimension = $dimension;
    }


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();

        $this->dimension->save();

        session()->flash('flash.banner', __('Dimension saved.'));

        $this->redirectRoute('dimensions.index');
    }
}
