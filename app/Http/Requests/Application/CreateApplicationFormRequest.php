<?php

namespace App\Http\Requests\Application;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

    class CreateApplicationFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = collect([
            "name" => "required|string|max:255",
            "phone" => [
                'required',
                'regex:/^\+380\d{9}$|^0\d{9}$/',
            ],
            "email" => "required|email",
            'message' => 'required|string',
            'files.*' => 'nullable|file|mimes:jpeg,png,jpg,pdf,doc,docx,csv,txt|max:1096',
        ]);

        return $rules->toArray();
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        $messages = collect([
            "phone.regex" => __(key: "validation.regex_format", replace: ['format' => '+380 ** *** ** **']),
            "files.*.mimes" => __(key: "validation.mimes", replace: ['attribute' => __('file')]),
            "files.*.max" => __(key: "validation.max.file"),
        ]);

        return $messages->toArray();
    }
}
