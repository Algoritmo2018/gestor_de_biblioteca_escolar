<?php

namespace App\Http\Requests;

use Illuminate\Support\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateBookRequest extends FormRequest
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
        $current_year = Carbon::now()->year;
        $rules = [
            'title' => [
                'required',
                'string',
                'max:255',
            ],
            'author' => [
                'required',
                'max:255',
            ],
            'category' => [
                'required',
                'max:255',
            ],
            'publishing_company' => [
                'required',
                'max:255',
            ],
            'number_of_copies' => [
                'required',
                'numeric',
                'min:0',
            ],
            'year_of_publication' => [
                'required',
                'numeric',
                'digits:4',
                'max: '.$current_year,
            ],
            'image_path' => [
                'required',
                'image',
            ],
        ];

        return $rules;
    }
}
