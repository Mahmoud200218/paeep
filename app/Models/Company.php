<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Company extends Model
{
    use HasFactory;

    // The attributes that are mass assignable.
    protected $fillable = [
        'cover_image', // The cover image of the company.
    ];

    protected $hidden = [
        'cover_image',
        'created_at',
        'updated_at'
    ];

    protected $appends = [
        'cover_image_url',
    ];

    public function getCoverImageUrlAttribute()
    {
        if (Str::startsWith($this->cover_image, ['https://', 'http://'])) {
            return $this->cover_image;
        }
        return asset('storage/' . $this->cover_image);
    }

}
