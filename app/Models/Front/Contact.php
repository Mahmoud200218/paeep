<?php

namespace App\Models\Front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Contact extends Model
{
    use HasFactory, Notifiable;

    // Define the fillable attributes that can be mass-assigned
    protected $fillable = [
        'fullname',
        'email',
        'title',
        'description',
        'policy'
    ];
}
