<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model implements TranslatableContract
{
    use Translatable;

    // Define translated attributes for the Event model.
    public $translatedAttributes = ['title', 'description'];

    // The attributes that are mass assignable.
    protected $fillable = ['cover_image', 'option', 'qr_code_content'];

    // Get the event time in 12-hour format.
    public function getCreatedAtEventTimeAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->format('h:i A');
    }

    // Get the event date in 'y-m-d' format.
    public function getCreatedAtEventDateAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->format('y-m-d');
    }

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

    public function visitRecords()
    {
        return $this->hasMany(VisitRecord::class);
    }
}
