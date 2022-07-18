<?php

namespace App\Http\Livewire\Questions;

use App\Models\Question;

class Delete extends \App\Http\Livewire\Components\Delete
{
    public function openDeleteModal(Question $model)
    {
        $this->model = $model;
        $this->showDeleteModal = true;
    }
}
