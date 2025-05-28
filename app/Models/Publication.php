<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Support\Str;

class Publication extends Model implements TranslatableContract
{
    use HasFactory;

    // Enable translation support for this model.
    use Translatable;

    // Define the attributes that can be translated (in this case, 'title').
    public $translatedAttributes = ['title'];

    // Define the attributes that can be filled in the model.
    protected $fillable = ['cover_image'];


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
