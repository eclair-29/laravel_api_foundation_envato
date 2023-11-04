<?php

namespace App\Http\Requests\v1;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreInvoiceRequest extends FormRequest
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
            '*.purchaserId' => ['required', 'integer'],
            '*.status' => ['required', Rule::in('paid', 'void', 'billed')],
            '*.amount' => ['required', 'numeric'],
            '*.billedDate' => ['required', 'date_format:Y-m-d H:i:s'],
            '*.paidDate' => ['nullable', 'date_format:Y-m-d H:i:s'],
        ];
    }

    public function prepareForValidation()
    {
        $data = [];

        foreach ($this->toArray() as $obj) {
            $obj['purchaser_id'] = $obj['purchaserId'] ?? null;
            $obj['billed_date'] = $obj['billedDate'] ?? null;
            $obj['paid_date'] = $obj['paidDate'] ?? null;

            $data[] = $obj;
        }

        $this->merge($data);
    }
}
