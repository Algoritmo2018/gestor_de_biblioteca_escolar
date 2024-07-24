<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => [
                'max:255',
            ],
            'type' => [
                'in:Interno,Externo',
                'max:255',
            ],
            'course_id' => [
                'max:255',
            ],
            'bi' => [
                'max:50', 
            ],
            'residence' => [
                'max:255',
            ],
            'contact' => [
                'max:255',
            ],
            'email' => [
                'max:255',
            ],
        ];

        return $rules;
    }
}
