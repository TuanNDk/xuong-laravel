<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
        $id = request()->segment(3);
        return [
            'catelogue_id' => ['required', Rule::exists('catelogues', 'id')],
            'name' => 'required|max:255',
            'sku' => 'required|max:255|unique:products,sku,' . $id,
            'img_thumbnail' => 'image',
            'price_regular' => 'required|min:0',
            'price_sale' => 'required|min:0',
            'description' => 'max:255',
            'content' => 'max:65000',
            'is_active' => [Rule::in([0, 1])],
            'is_hot_deal' => [Rule::in([0, 1])],
            'is_good_deal' => [Rule::in([0, 1])],
            'is_new' => [Rule::in([0, 1])],
            'is_show_home' => [Rule::in([0, 1])],

            'product_variants' => 'array',
            'product_variants.*.quantity' => 'min:0',
            'product_variants.*.image' => 'image',

            'tags' => 'array',
            'tags.*' => ['required', 'integer', Rule::exists('tags', 'id')],

            'product_galleries' => 'array',
            'product_galleries.*' => 'image',
        ];
    }
}
