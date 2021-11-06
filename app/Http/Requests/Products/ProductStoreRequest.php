<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
        $sellingPrice = [];

        if (auth()->user()->role !== 'supplier') {
            $sellingPrice = ['required', 'numeric', 'min:0.01'];
        }

        return [
            'product_name' => ['required', 'string', 'max:255', 'distinct', 'unique:products'],
            'slug' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'category' => ['required'],
            'product_price' => ['required', 'numeric', 'min:0.01'],
            'selling_price' => $sellingPrice,
            'quantity' => ['required', 'numeric', 'min:1'],
        ];
    }
}
