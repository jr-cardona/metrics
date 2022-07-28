<?php

namespace App\Http\Livewire\Answers;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Store extends Component
{
    public function render()
    {
        $answers = request()->all();

        foreach ($answers as $key => $value) {
            if (is_int($key)) {
                DB::table('answers')->insert([
                    'question_survey_id' => $key,
                    'value' => $value,
                ]);
            }
        }

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => __('Answers stored') . '!',
            'text' => __('Now you can see your results'),
        ]);

        return view('livewire.answers.results')->layout('layouts.guest');
    }
}
