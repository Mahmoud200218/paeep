<?php

namespace App\Models\Front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Volunteer extends Model
{
    use HasFactory;

    // Define the fillable attributes that can be mass-assigned
    protected $fillable = [
        'full_name',
        'phone_number',
        'email',
        'address',
        'volunteer',
        'volunteer_details',
        'skills',
        'skills_details',
        'beginning',
        'ending',
        'experience',
        'cv',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'cv'
    ];

    protected $appends = [
        'cv_url'
    ];

    public function getCvUrlAttribute()
    {
        if(Str::startsWith($this->cv, ['https://', 'http://'])){
            return $this->cv;
        }
        return asset('storage/' . $this->cv);
    }
}
