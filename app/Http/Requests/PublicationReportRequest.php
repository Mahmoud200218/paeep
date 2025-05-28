<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicationReportRequest extends FormRequest
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
            'cover_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'title_en' => ['required', 'string', 'max:255'],
            'title_ar' => ['required', 'string', 'max:255'],
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
        ];
    }
}
