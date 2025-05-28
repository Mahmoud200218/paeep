<?php

namespace App\Models\Payments;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    // The 'casts' property specifies how certain attributes should be converted to and from data types.
    protected $casts = [
        'payment_response' => 'json', // 'payment_response' is cast as JSON.
    ];
}
