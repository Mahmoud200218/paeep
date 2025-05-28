<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicationTranslation extends Model
{
    use HasFactory;

    // Disable timestamps for this model.
    public $timestamps = false;

    // Define the attributes that can be filled in the model.
    protected $fillable = ['locale', 'title'];
}
