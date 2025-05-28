<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Support\Str;

class Program extends Model implements TranslatableContract
{
    use Translatable;

    // Define the translated attributes for this model.
    public $translatedAttributes = ['title', 'description'];

    // Define the fillable attributes for this model.
    protected $fillable = [
        'cover_image',
    ];

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
