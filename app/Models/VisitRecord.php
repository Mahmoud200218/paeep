<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'user_identifier',
        'visit_count',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
