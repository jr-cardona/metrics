<?php

namespace App\Http\Livewire\Components;

use Illuminate\Database\Eloquent\Model;
use Illuminate\View\View;
use Livewire\Component;

class Delete extends Component
{
    protected $listeners = ['openDeleteModal'];

    public bool $showDeleteModal = false;

    public string $modelClass;

    public string $parentComponent;

    public Model $model;

    public function openDeleteModal(int $id)
    {
        $this->model = (new $this->modelClass)->find($id);
        $this->showDeleteModal = true;
    }

    public function render(): View
    {
        return view('livewire.components.delete-modal');
    }

    public function delete()
    {
        $this->model->delete();

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Record deleted!',
        ]);

        $this->showDeleteModal = false;

        $this->emitTo($this->parentComponent, 'deleted');
    }
}
