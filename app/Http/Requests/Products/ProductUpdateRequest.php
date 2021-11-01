<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'category' => ['required'],
            'product_price' => ['required', 'numeric', 'min:0.01'],
            'selling_price' => ['required', 'numeric', 'min:0.01'],
            'quantity' => ['required', 'numeric', 'min:0'],
        ];
    }
}
