<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventTranslation extends Model
{
    use HasFactory;

    // Disable timestamps for this model.
    public $timestamps = false;

    // The attributes that are mass assignable for translation.
    protected $fillable = [
        'locale', // The locale of the translation.
        'title', // The translated title.
        'description' // The translated description.
    ];
}
