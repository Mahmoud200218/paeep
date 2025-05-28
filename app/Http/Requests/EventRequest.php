<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'cover_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'], // Validation rule for cover image.
            'title_en' => ['required', 'string', 'max:255'], // Validation rule for English title.
            'title_ar' => ['required', 'string', 'max:255'], // Validation rule for Arabic title.
            'description_en' => ['required', 'string'], // Validation rule for English description.
            'description_ar' => ['required', 'string'], // Validation rule for Arabic description.
        ];
    }

    public function messages(): array
    {
        return [
            'cover_image.image' => 'The cover image must be a valid image file.',
            'cover_image.mimes' => 'The cover image must be in one of the following formats: jpeg, png, jpg, gif, svg.',
            'cover_image.max' => 'The cover image may not be larger than 2MB.',
            'title_en.required' => 'The English title is required.',
            'title_ar.required' => 'The Arabic title is required.',
            'title_en.string' => 'The English title must be a string.',
            'title_ar.string' => 'The Arabic title must be a string.',
            'title_en.max' => 'The English title may not be longer than 255 characters.',
            'title_ar.max' => 'The Arabic title may not be longer than 255 characters.',
            'description_en.required' => 'The English description is required.',
            'description_ar.required' => 'The Arabic description is required.',
            'description_en.string' => 'The English description must be a string.',
            'description_ar.string' => 'The Arabic description must be a string.',
        ];
    }
}
