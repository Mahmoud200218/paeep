<?php

namespace App\Models\Front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CompaniesRequest extends Model
{
    use HasFactory;

    // Define the fillable attributes that can be mass-assigned
    protected $fillable = [
        'organization_name',
        'type_of_organization',
        'main_address',
        'year_founded',
        'website',
        'instagram',
        'facebook',
        'annual_budget',
        'number_of_centers',
        'number_of_employees',
        'center_locations',
        'registration_number_with_the_ministry_of_interior',
        'registration_number_with_the_ministry_of_finance',
        'number_of_current_projects',
        'major_donors_of_projects',
        'total_number_of_employees',
        'nationalities_of_beneficiaries',
        'age_group_of_beneficiaries',
        'main_strategic_objectives',
        'registration_certificate',
        'structure_organisationnelle',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'registration_certificate',
        'structure_organisationnelle'
    ];

    protected $appends = [
        'certificate',
        'organisationnelle'
    ];

    public function getCertificateAttribute()
    {
        if (Str::startsWith($this->registration_certificate, ['https://', 'http://'])) {
            return $this->registration_certificate;
        }
        return asset('storage/' . $this->registration_certificate);
    }

    public function getOrganisationnelleAttribute()
    {
        if (Str::startsWith($this->structure_organisationnelle, ['https://', 'http://'])) {
            return $this->structure_organisationnelle;
        }
        return asset('storage/' . $this->structure_organisationnelle);
    }
}
