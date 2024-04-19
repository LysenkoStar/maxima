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
            "slug"                => "required|string|max:255|unique:max_products,slug",
            "images.*"            => "image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "product_category_id" => "required|exists:max_product_categories,id",
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
            "slug.unique" => "The field must be unique",
            "slug.required" => "Field is required",
            "images.image" => "The file must be an image",
            "images.mimes" => "The image must be a file of type: :values",
            "images.max" => "The image may not be greater than :max kilobytes",
        ]);

        foreach (config('app.available_locales') as $key => $locale) {
            $messages = $messages->merge([
                "name.{$key}.required" => 'Field is required',
                "description.{$key}.required" => 'Field is required',
            ]);
        }

        return $messages->toArray();
    }
}
