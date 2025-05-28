<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class DonateRequest extends FormRequest
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
            'payment_method' => ['required', 'exists:payment_methods,slug'],
            'donater_name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone_number' => ['required', 'max:20'],
            'project_type' => ['required', 'in:community_care_initiatives,elderly_care,safe_streets,empowerment_for_all,emergency_relief'],
            'message' => ['required', 'max:500'],
            'price' => ['nullable'],
            'other_price' => ['nullable'],
        ];
    }

    public function messages(): array
    {
        return [
            'payment_method.required' => 'Please select a payment method.',
            'donater_name.required' => 'Please enter your name.',
            'donater_name.max' => 'The name may not be longer than 255 characters.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please provide a valid email address.',
            'email.max' => 'The email may not be longer than 255 characters.',
            'phone_number.required' => 'Please enter your phone number.',
            'project_type.required' => 'Please select a project type.',
            'project_type.in' => 'Invalid project type selected.',
            'message.required' => 'Please enter a message.',
            'message.max' => 'The message may not be longer than 500 characters.',
        ];
    }
}
