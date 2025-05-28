<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User; // Extending from the User model for authentication.
use Illuminate\Notifications\Notifiable;

class Admin extends User // Extend the Admin model from the User model.
{
    use HasFactory, Notifiable;

    // The attributes that are mass assignable.
    protected $fillable = [
        'name',      // The name of the admin.
        'email',     // The email address of the admin.
        'password',  // The password of the admin (hashed).
    ];
}
