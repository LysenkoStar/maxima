<?php

namespace App\Http\Requests\Product;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductFormRequest extends FormRequest
{

    /**
     * @return void
     */
    public function prepareForValidation(): void
    {
        if (empty($this->product_category_id)) {
            $this->merge([
                'product_category_id' => null,
            ]);
        }

        if ($this->has('images')) {
            $images = collect($this->get('images'));

            $updatedImages = $images->map(function ($image, $index) {
                $file = $this->file("images.$index");

                if (!empty($image['isExisting']) && $image['isExisting']) {
                    return $image;
                }

                if ($file) {
                    $image['file'] = $file;
                }

                return $image;
            });

            $this->merge([
                'images' => $updatedImages->toArray(),
            ]);
        }
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = collect([
            "slug"                  => "required|string|max:255|unique:max_products,slug," . $this->product->id,
            "images"                => "nullable|array",
            'images.*.id'           => 'nullable|integer|exists:max_product_images,id',
            'images.*.name'         => 'nullable|string|max:255',
            'images.*.status'       => 'required|boolean',
            'images.*.delete'       => 'nullable|boolean',
            'images.*.isExisting'   => 'required|boolean',
            'images.*.sort'         => 'required|integer',
            "images.*.file"         => "nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "status"                => "required|boolean",
            "product_category_id"   => "nullable|integer|exists:max_product_categories,id",
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
