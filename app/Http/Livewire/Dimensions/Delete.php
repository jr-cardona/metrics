<?php

namespace App\Http\Livewire\Dimensions;

use App\Models\Dimension;

class Delete extends \App\Http\Livewire\Components\Delete
{
    public function openDeleteModal(Dimension $model)
    {
        $this->model = $model;
        $this->showDeleteModal = true;
    }
}
