<?php

namespace App\Models\Front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Job extends Model
{
    use HasFactory;

    // Define the fillable attributes that can be mass-assigned
    protected $fillable = [
        'first_name',
        'parent_name',
        'grandfather_name',
        'family_name',
        'phone_number',
        'email',
        'gender',
        'qualification',
        'date_of_birth',
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
        if (Str::startsWith($this->cv, ['https://', 'http://'])) {
            return $this->cv;
        }
        return asset('storage/' . $this->cv);
    }
}
