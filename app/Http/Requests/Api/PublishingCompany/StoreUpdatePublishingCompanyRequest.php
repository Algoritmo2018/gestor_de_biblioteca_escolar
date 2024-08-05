<?php

namespace App\Http\Requests\Api\PublishingCompany;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePublishingCompanyRequest extends FormRequest
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
            'publishing_company' => [
                'required',
                'min:1',
                'max:255',
                'unique:publishing_companies',
            ]
        ];

        return $rules;
    }
}
