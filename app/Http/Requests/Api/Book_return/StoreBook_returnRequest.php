<?php

namespace App\Http\Requests\Api\Book_return;

use Illuminate\Foundation\Http\FormRequest;

class StoreBook_returnRequest extends FormRequest
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

            return [
                'borrowed_book_id' => 'required|unique:book_returns',
                'student_id' => 'required',
                'book_id' => 'required',
                'observation' => 'required',
            ];

    }
}
