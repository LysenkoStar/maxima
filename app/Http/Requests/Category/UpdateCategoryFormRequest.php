<?php

namespace App\Http\Requests\Category;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = collect([
            "slug" => "required|string|max:255|unique:max_product_categories,slug," . $this->category->id,
            "image" => "image|mimes:jpeg,png,jpg,gif,svg|max:2048",
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
            "image.image" => __(key: 'validation.image'),
            "image.mimes" => __(key: 'validation.mimes'),
            "image.max" => __(key: 'validation.max.file'),
        ]);

        foreach (config('app.available_locales') as $key => $locale) {
            $messages = $messages->merge([
                "title.{$key}.required" => __(key: 'validation.required'),
                "description.{$key}.required" => __(key: 'validation.required'),
                "short_description.{$key}.required" => __(key: 'validation.required'),
                "text.{$key}.required" => __(key: 'validation.required'),
            ]);
        }

        return $messages->toArray();
    }
}
