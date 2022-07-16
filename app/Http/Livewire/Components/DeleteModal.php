<?php

namespace App\Http\Livewire\Components;

use Illuminate\View\View;
use Livewire\Component;

class DeleteModal extends Component
{
    protected $listeners = ['confirmDeletion'];

    public $model;

    public bool $showDeleteModal = false;

    public function render(): View
    {
        return view('livewire.components.delete-modal');
    }

    public function confirmDeletion($model)
    {
        if ($this->model->id === $model['id']) {
            $this->showDeleteModal = true;
        }
    }

    public function delete()
    {
        $this->model->delete();

        session()->flash('flash.bannerStyle', 'danger');
        session()->flash('flash.banner', __(' deleted.'));

        $this->redirect(url()->previous());
    }
}
