<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class VolunteerRequest extends FormRequest
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
            'full_name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'unique:volunteers,phone_number'],
            'email' => ['required', 'email', 'unique:volunteers,email'],
            'address' => ['required', 'string', 'max:255'],
            'volunteer' => ['required', 'in:yes,no'],
            'volunteer_details' => ['nullable', 'string', 'max:500'],
            'skills' => ['required', 'in:yes,no'],
            'skills_details' => ['nullable', 'string', 'max:500'],
            'beginning' => ['required', 'date'],
            'ending' => ['required', 'date', 'after_or_equal:beginning'],
            'experience' => ['required', 'string'],
            'cv' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'full_name.required' => 'Please provide your full name.',
            'full_name.string' => 'The full name must be a string.',
            'full_name.max' => 'The full name may not be longer than 255 characters.',
            'phone_number.required' => 'Please provide your phone number.',
            'phone_number.string' => 'The phone number must be a string.',
            'phone_number.unique' => 'This phone number is already in use.',
            'email.required' => 'Please provide your email address.',
            'email.email' => 'Please provide a valid email address.',
            'email.unique' => 'This email address is already in use.',
            'address.required' => 'Please provide your address.',
            'address.string' => 'The address must be a string.',
            'address.max' => 'The address may not be longer than 255 characters.',
            'volunteer.required' => 'Please specify if you want to volunteer (yes or no).',
            'volunteer.in' => 'Please choose either "yes" or "no" for volunteering.',
            'volunteer_details.string' => 'Volunteer details must be a string.',
            'volunteer_details.max' => 'Volunteer details may not be longer than 500 characters.',
            'skills.required' => 'Please specify if you have any skills (yes or no).',
            'skills.in' => 'Please choose either "yes" or "no" for skills.',
            'skills_details.string' => 'Skills details must be a string.',
            'skills_details.max' => 'Skills details may not be longer than 500 characters.',
            'beginning.required' => 'Please specify the beginning date.',
            'beginning.date' => 'Please provide a valid date for the beginning.',
            'ending.required' => 'Please specify the ending date.',
            'ending.date' => 'Please provide a valid date for the ending.',
            'ending.after_or_equal' => 'The ending date must be after or equal to the beginning date.',
            'experience.required' => 'Please provide details of your experience.',
            'cv.required' => 'Please upload your CV.',
        ];
    }
}
