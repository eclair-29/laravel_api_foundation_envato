<?php

namespace App\Http\Requests\v1;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePurchaserRequest extends FormRequest
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
        $httpMethod = $this->method();

        if ($httpMethod == 'PUT') return [
            'name' => 'required',
            'type' => ['required', Rule::in(['Individual', 'Business', 'individual', 'business'])],
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'zipcode' => 'required',
        ];

        return [
            'name' => ['sometimes', 'required'],
            'type' => ['sometimes', 'required', Rule::in(['Individual', 'Business', 'individual', 'business'])],
            'phone' => ['sometimes', 'required'],
            'address' => ['sometimes', 'required'],
            'city' => ['sometimes', 'required'],
            'province' => ['sometimes', 'required'],
            'country' => ['sometimes', 'required'],
            'zipcode' => ['sometimes', 'required'],
        ];
    }

    public function prepareForValidation()
    {
        //
    }
}
