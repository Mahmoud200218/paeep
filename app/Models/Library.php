<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Support\Str;

class Library extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    // Define the translated attributes for this model.
    public $translatedAttributes = ['title', 'description'];

    // Define the attributes that are mass assignable.
    protected $fillable = ['cover_image', 'photos'];


    protected $hidden = [
        'cover_image',
        'created_at',
        'updated_at',
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
