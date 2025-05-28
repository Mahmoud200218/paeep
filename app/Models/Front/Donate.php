<?php

namespace App\Models\Front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donate extends Model
{
    use HasFactory;

    // Define the fillable attributes that can be mass-assigned
    protected $fillable = [
        'donater_name',
        'email',
        'phone_number',
        'project_type',
        'message',
        'price',
        'other_price',
        'confirmation'
    ];

    // Define validation rules for creating or updating a donation
    public static function DonateValidation()
    {
        return [
            'payment_method' => ['required', 'exists:payment_methods,slug'],
            'donater_name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone_number' => ['required'],
            'project_type' => ['required', 'in:community_care_initiatives,elderly_care,safe_streets,empowerment_for_all,emergency_relief'],
            'message' => ['required', 'max:500'],
            'price' => ['nullable'],
            'other_price' => ['nullable'],
        ];
    }

    // Define an accessor to get the currency code (e.g., 'USD')
    public function getCurrencyCodeAttribute()
    {
        return 'USD';
    }

    // Define a relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
