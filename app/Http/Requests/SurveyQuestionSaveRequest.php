<?php

namespace App\Http\Requests;

use App\Enums\QuestionTypes;
use App\Models\Question;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SurveyQuestionSaveRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'question.title' => ['required', 'string', 'max:500'],
            'question.dimension_id' => ['required', 'integer', 'exists:dimensions,id'],
        ];
    }
}
