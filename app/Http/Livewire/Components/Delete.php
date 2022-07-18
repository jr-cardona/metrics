<?php

namespace App\Http\Livewire\Components;

use Illuminate\Database\Eloquent\Model;
use Illuminate\View\View;
use Livewire\Component;

class Delete extends Component
{
    protected $listeners = ['openDeleteModal'];

    public bool $showDeleteModal = false;

    public $model;

    public function render(): View
    {
        return view('components.delete-modal');
    }

    public function delete()
    {
        $this->model->delete();

        session()->flash('flash.bannerStyle', 'danger');
        session()->flash('flash.banner', __('Record deleted.'));

        $this->redirect(url()->previous());
    }
}
