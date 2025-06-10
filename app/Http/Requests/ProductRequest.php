<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'product_type_id' => 'required|exists:product_types,id',
            'name' => 'required|string|max:255',
            'article' => 'required|string|max:255',
            'min_price' => 'required|decimal:0,2|min:0.01|max:100000000.00',
            'width' => 'required|decimal:0,2|min:0.01|max:100.00',
        ];
    }

}
