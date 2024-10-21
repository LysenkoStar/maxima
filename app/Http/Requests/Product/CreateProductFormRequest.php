<?php

namespace App\Http\Requests\Product;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateProductFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = collect([
            "slug" => "required|string|max:255|unique:max_product_categories,slug",
            "images.*" => "image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "status" => "required|boolean",
            "product_category_id" => "required|integer|exists:max_product_categories,id",
        ]);

        foreach (config('app.available_locales') as $key => $locale) {
            $rules = $rules->merge([
                "name.{$key}" => 'required|string|max:255',
                "description.{$key}" => 'required|string',
            ]);
        }

        return $rules->toArray();
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        $messages = collect([
            "slug.unique" => __(key: 'validation.unique'),
            "slug.required" => __(key: 'validation.required'),
            "images.*.mimes" => __(key: 'validation.mimes'),
            "images.*.max" => __(key: 'validation.max.file'),
            "status.boolean" => __(key: 'validation.boolean'),
            "product_category_id.required" => __(key: 'validation.required'),
            "product_category_id.integer" => __(key: 'validation.integer'),
            "product_category_id.exists" => __(key: 'validation.exists'),
        ]);

        foreach (config('app.available_locales') as $key => $locale) {
            $messages = $messages->merge([
                "name.{$key}.required" => __(key: 'validation.required'),
                "description.{$key}.required" => __(key: 'validation.required'),
            ]);
        }

        return $messages->toArray();
    }
}
