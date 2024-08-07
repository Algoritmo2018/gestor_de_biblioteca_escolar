<?php

namespace App\Http\Requests\Api\Book;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;

class UpdateBookRequest extends FormRequest
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
                
                'max:255',
            ],
            'author_id' => [
                'max:255',
            ],
            'category_id' => [
                'max:255',
            ],
            'publishing_company_id' => [
                'max:255',
            ],
            'number_of_copies' => [
                'numeric',
                'min:0',
            ],
            'year_of_publication' => [
                'numeric',
                'digits:4',
                'max: ' . $current_year,
            ],
        ];

        return $rules;
    }
}
