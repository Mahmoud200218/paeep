<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'fullname' => ['required', 'string', 'between:2,255'],
            'email' => ['required', 'email', 'between:2,255'],
            'description' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            "fullname.required" => "Please enter your name",
            "email.required" => "Please enter your email",
            "description.required" => "Please write a message",
            "email.email" => "Invalid email address",
            "fullname.between" => "The full name field must be between 2 and 255 characters",
            "email.between" => "The email field must be between 2 and 255 characters"
        ];
    }
}
