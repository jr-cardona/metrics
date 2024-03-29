<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SurveySaveRequest extends FormRequest
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

    protected function prepareForValidation(): void
    {
        $this->is_active = true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'survey.title' => ['string', 'max:255'],
            'survey.description' => ['nullable'],
        ];
    }
}
