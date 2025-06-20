<?php

namespace App\Http\Requests\Service;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateServiceFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = collect([
            "slug" => "required|string|max:255|unique:max_services,slug",
            "image" => "image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        foreach (config('app.available_locales') as $key => $locale) {
            $rules = $rules->merge([
                "title.{$key}" => 'required|string|max:255',
                "description.{$key}" => 'required|string',
                "short_description.{$key}" => 'required|string',
                "text.{$key}" => 'required|string',
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
            "image.image" => "The file must be an image",
            "image.mimes" => "The image must be a file of type: :values",
            "image.max" => "The image may not be greater than :max kilobytes",
        ]);

        foreach (config('app.available_locales') as $key => $locale) {
            $messages = $messages->merge([
                "title.{$key}.required" => 'Field is required',
                "description.{$key}.required" => 'Field is required',
                "short_description.{$key}.required" => 'Field is required',
                "text.{$key}.required" => 'Field is required',
            ]);
        }

        return $messages->toArray();
    }
}
