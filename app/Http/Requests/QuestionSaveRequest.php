<?php

namespace App\Http\Requests;

use App\Enums\QuestionTypes;
use App\Models\Question;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class QuestionSaveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, array>
     */
    public function rules(Question $question): array
    {
        return [
            'question.title' => ['required', 'string', 'max:500'],
            'question.type' => ['required', Rule::in(QuestionTypes::names())],
            'question.options' => [
                'nullable',
                Rule::requiredIf(in_array($question->type, QuestionTypes::withOptions())),
                'array',
            ],
            'question.dimension_id' => ['required', 'integer', 'exists:dimensions,id'],
        ];
    }
}
