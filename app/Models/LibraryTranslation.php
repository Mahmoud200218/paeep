<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibraryTranslation extends Model
{
    use HasFactory;

    // Disable timestamps for this model.
    public $timestamps = false;

    // Define the attributes that are mass assignable.
    protected $fillable = ['locale', 'title', 'description'];
}
