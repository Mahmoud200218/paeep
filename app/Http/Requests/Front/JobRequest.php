<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max:255'],
            'parent_name' => ['required', 'string', 'max:255'],
            'grandfather_name' => ['required', 'string', 'max:255'],
            'family_name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:15', 'unique:jobs,phone_number'],
            'email' => ['required', 'email', 'unique:jobs,email'],
            'gender' => ['required', 'in:male,female'],
            'qualification' => ['required', 'in:bachelors,diploma,college_student,high_school'],
            'date_of_birth' => ['required', 'date'],
            'cv' => ['required', 'max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'Please provide your first name.',
            'first_name.string' => 'The first name must be a string.',
            'first_name.max' => 'The first name may not be longer than 255 characters.',
            'parent_name.required' => 'Please provide your parent name.',
            'parent_name.string' => 'The parent name must be a string.',
            'parent_name.max' => 'The parent name may not be longer than 255 characters.',
            'grandfather_name.required' => 'Please provide your grandfather name.',
            'grandfather_name.string' => 'The grandfather name must be a string.',
            'grandfather_name.max' => 'The grandfather name may not be longer than 255 characters.',
            'family_name.required' => 'Please provide your family name.',
            'family_name.string' => 'The family name must be a string.',
            'family_name.max' => 'The family name may not be longer than 255 characters.',
            'phone_number.required' => 'Please provide your phone number.',
            'phone_number.string' => 'The phone number must be a string.',
            'phone_number.max' => 'The phone number may not be longer than 15 characters.',
            'phone_number.unique' => 'This phone number is already in use.',
            'email.required' => 'Please provide your email address.',
            'email.email' => 'Please provide a valid email address.',
            'email.unique' => 'This email address is already in use.',
            'gender.required' => 'Please specify your gender (male or female).',
            'gender.in' => 'Please choose either "male" or "female" for gender.',
            'qualification.required' => 'Please specify your qualification (bachelors, diploma, college student, or high school).',
            'qualification.in' => 'Please choose a valid qualification.',
            'date_of_birth.required' => 'Please specify your date of birth.',
            'date_of_birth.date' => 'Please provide a valid date of birth.',
            'cv.required' => 'Please upload your CV.',
            'cv.max' => 'The CV file size may not exceed 2MB.',
        ];
    }
}
