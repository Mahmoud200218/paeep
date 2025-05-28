<?php

namespace App\Http\Requests\Front;

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
            'organization_name' => ['required', 'string', 'max:255'],
            'type_of_organization' => ['required', 'in:undefined,cultural_and_artistic_center,educational_or_higher_education_institution,governmental_entity,international_non_governmental_organization,media_and_press_organization,non_governmental_organization,organizations_of_people_with_disabilities,private_company,research_and_advocacy_centre,social_institution,technical_or_vocational_education_institute,youth_group,youth_training_center'],
            'main_address' => ['required', 'string', 'max:255'],
            'year_founded' => ['required', 'date'],
            'website' => ['required', 'url', 'max:255'],
            'instagram' => ['required', 'url', 'max:255'],
            'facebook' => ['required', 'url', 'max:255'],
            'annual_budget' => ['required', 'numeric'],
            'number_of_centers' => ['required', 'string', 'max:255'],
            'number_of_current_projects' => ['required', 'string', 'max:255'],
            'major_donors_of_projects' => ['required', 'string', 'max:255'],
            'number_of_employees' => ['required', 'string', 'max:255'],
            'center_locations' => ['required', 'string'],
            'registration_number_with_the_ministry_of_interior' => ['required', 'string', 'max:255'],
            'registration_number_with_the_ministry_of_finance' => ['required', 'string', 'max:255'],
            'total_number_of_employees' => ['required', 'string', 'max:255'],
            'nationalities_of_beneficiaries' => ['required', 'string'],
            'age_group_of_beneficiaries' => ['required', 'string', 'max:255'],
            'main_strategic_objectives' => ['required', 'string', 'max:255'],
            'registration_certificate' => ['required', 'max:2048'],
            'structure_organisationnelle' => ['required', 'max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'organization_name.required' => 'The organization name is required.',
            'organization_name.string' => 'The organization name must be a valid string.',
            'organization_name.max' => 'The organization name may not exceed 255 characters.',
            'type_of_organization.required' => 'Please select the type of organization.',
            'type_of_organization.in' => 'Please choose a valid type of organization from the options provided.',
            'main_address.required' => 'The main address is required.',
            'main_address.string' => 'The main address must be a valid string.',
            'main_address.max' => 'The main address may not exceed 255 characters.',
            'year_founded.required' => 'The year of organization founding is required.',
            'year_founded.date' => 'Please provide a valid date for the year of founding.',
            'website.url' => 'Please provide a valid URL for the organization\'s website.',
            'website.max' => 'The website URL may not exceed 255 characters.',
            'website.required' => 'The website link is required.',
            'instagram.url' => 'Please provide a valid URL for the organization\'s Instagram profile.',
            'instagram.max' => 'The Instagram URL may not exceed 255 characters.',
            'instagram.required' => 'The instagram link is required.',
            'facebook.url' => 'Please provide a valid URL for the organization\'s Facebook page.',
            'facebook.max' => 'The Facebook URL may not exceed 255 characters.',
            'facebook.required' => 'The facebook link is required.',
            'annual_budget.required' => 'The annual budget is required.',
            'annual_budget.numeric' => 'The annual budget must be a valid numeric value.',
            'number_of_centers.required' => 'The number of centers is required.',
            'number_of_centers.string' => 'The number of centers must be a valid string.',
            'number_of_centers.max' => 'The number of centers may not exceed 255 characters.',
            'number_of_current_projects.required' => 'The number of current projects is required.',
            'number_of_current_projects.string' => 'The number of current projects must be a valid string.',
            'number_of_current_projects.max' => 'The number of current projects may not exceed 255 characters.',
            'major_donors_of_projects.required' => 'The major donors of projects is required.',
            'major_donors_of_projects.string' => 'The major donors of projects must be a valid string.',
            'major_donors_of_projects.max' => 'The major donors of projects may not exceed 255 characters.',
            'number_of_employees.required' => 'The number of employees is required.',
            'number_of_employees.string' => 'The number of employees must be a valid string.',
            'number_of_employees.max' => 'The number of employees may not exceed 255 characters.',
            'center_locations.required' => 'The center locations are required.',
            'registration_number_with_the_ministry_of_interior.required' => 'The registration number with the Ministry of Interior is required.',
            'registration_number_with_the_ministry_of_interior.string' => 'The registration number with the Ministry of Interior must be a valid string.',
            'registration_number_with_the_ministry_of_interior.max' => 'The registration number with the Ministry of Interior may not exceed 255 characters.',
            'registration_number_with_the_ministry_of_finance.required' => 'The registration number with the Ministry of Finance is required.',
            'registration_number_with_the_ministry_of_finance.string' => 'The registration number with the Ministry of Finance must be a valid string.',
            'registration_number_with_the_ministry_of_finance.max' => 'The registration number with the Ministry of Finance may not exceed 255 characters.',
            'total_number_of_employees.required' => 'The total number of employees is required.',
            'total_number_of_employees.string' => 'The total number of employees must be a valid string.',
            'total_number_of_employees.max' => 'The total number of employees may not exceed 255 characters.',
            'nationalities_of_beneficiaries.required' => 'The nationalities of beneficiaries are required.',
            'age_group_of_beneficiaries.required' => 'The age group of beneficiaries is required.',
            'age_group_of_beneficiaries.string' => 'The age group of beneficiaries must be a valid string.',
            'age_group_of_beneficiaries.max' => 'The age group of beneficiaries may not exceed 255 characters.',
            'main_strategic_objectives.required' => 'The main strategic objectives are required.',
            'main_strategic_objectives.string' => 'The main strategic objectives must be a valid string.',
            'main_strategic_objectives.max' => 'The main strategic objectives may not exceed 255 characters.',
            'registration_certificate.required' => 'Please upload the registration certificate.',
            'registration_certificate.max' => 'The registration certificate file size may not exceed 2MB.',
            'structure_organisationnelle.required' => 'Please upload the organizational structure document.',
            'structure_organisationnelle.max' => 'The organizational structure document file size may not exceed 2MB.',
        ];
    }
}
