<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleStoreRequest extends FormRequest
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
            'seller_id' => 'required|int|exists:sellers,id',
            'amount' => 'required|numeric|min:0.01|regex:/^\d+(.\d{1,2})?$/',
        ];
    }

    public function messages()
    {
        return [
            'amount.min' => 'O campo :attribute deve ser maior ou igual a 0.01',
            'amount.regex' => 'O campo :attribute deve possuir até duas casas decimais',
        ];
    }
}
