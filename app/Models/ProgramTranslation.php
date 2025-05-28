<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramTranslation extends Model
{
    // Disable timestamps for this model.
    public $timestamps = false;

    // Define the fillable attributes for this model.
    protected $fillable = [
        'locale', 'title', 'description'
    ];
}
