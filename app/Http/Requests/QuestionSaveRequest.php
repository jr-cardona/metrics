<?php

namespace App\Http\Requests;

use App\Enums\QuestionTypes;
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
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:500'],
            'type' => ['required', Rule::in(QuestionTypes::names())],
            'options' => ['nullable', 'array'],
            'dimension_id' => ['nullable', 'integer', 'exists:dimensions,id'],
        ];
    }
}
