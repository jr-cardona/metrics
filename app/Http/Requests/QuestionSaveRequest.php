<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'question.title' => ['required', 'string', 'max:500'],
            'question.is_active' => ['required'],
            'question.type' => ['required', 'in:text,textarea,checkbox,check,date,datetime,select,integer,radiobutton,phone,email,url'],
            'question.number' => ['required', 'integer', 'gt:0'],
            'question.dimension_id' => ['integer', 'exists:dimensions,id'],
        ];
    }
}
