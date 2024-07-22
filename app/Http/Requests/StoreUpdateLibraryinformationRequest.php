<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateLibraryinformationRequest extends FormRequest
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
            'bi' => [
                'required',
                'min:10',
                'max:255',
                'unique:library_information',
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
        ];

        return $rules;
    }
}
