<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation rule for cover image.
        ];
    }

    public function messages()
    {
        return [
            'cover_image.required' => 'The cover image filed is required.',
            'cover_image.image' => 'The cover image must be a valid image file.',
            'cover_image.mimes' => 'The cover image must be in one of the following formats: jpeg, png, jpg, gif, svg.',
            'cover_image.max' => 'The cover image may not be larger than 2MB.',
        ];
    }
}
