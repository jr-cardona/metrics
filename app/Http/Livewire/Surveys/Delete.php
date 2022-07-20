<?php

namespace App\Http\Livewire\Surveys;

use App\Models\Survey;

class Delete extends \App\Http\Livewire\Components\Delete
{
    public function openDeleteModal(Survey $model)
    {
        $this->model = $model;
        $this->showDeleteModal = true;
    }
}
