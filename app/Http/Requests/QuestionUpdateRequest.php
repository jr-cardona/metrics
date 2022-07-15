<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionUpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:500'],
            'is_active' => ['required'],
            'type' => ['required', 'in:text,textarea,checkbox,check,date,datetime,select,integer,radiobutton,phone,email,url'],
            'number' => ['required', 'integer', 'gt:0'],
            'dimension_id' => ['integer', 'exists:dimensions,id'],
            'softdeletes' => ['required'],
        ];
    }
}
