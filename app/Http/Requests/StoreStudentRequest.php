<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
                'required',
                'min:1',
                'max:255',
            ],
            'type' => [
                'required',
                'in:Interno,Externo',
                'max:255',
            ],
            'course_id' => [
                'required',
                'min:9',
                'max:255',
            ],
            'bi' => [
                'required',
                'min:9',
                'max:50',
                'unique:students',
            ],
            'residence' => [
                'required',
                'min:1',
                'max:255',
            ],
            'contact' => [
                'required',
                'min:9',
                'max:255',
            ],
            'email' => [
                'required',
                'max:255',
                'unique:students',
            ],
        ];

        return $rules;
    }
}
