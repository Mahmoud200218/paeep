<?php

namespace App\Models\Payments;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    // The attributes that are mass assignable.
    protected $fillable = [
        'name',          // The name of the payment method.
        'slug',          // A unique identifier (slug) for the payment method.
        'description',   // A description of the payment method.
        'icon',          // An icon representing the payment method.
        'status',        // The status of the payment method (e.g., 'active' or 'inactive').
        'options',       // Additional options for the payment method, stored as JSON.
    ];

    protected $hidden = [
        'options',
        'created_at',
        'updated_at',
        'icon',
        'name'
    ];

    // The attributes that should be cast to native types.
    protected $casts = [
        'options' => 'json',  // Cast the 'options' attribute as JSON data.
    ];

    /**
     * Enable the payment method.
     */
    public function enable()
    {
        $this->update(['status' => 'active']); // Update the status to 'active'.
    }

    /**
     * Disable the payment method.
     */
    public function disable()
    {
        $this->update(['status' => 'inactive']); // Update the status to 'inactive'.
    }

    /**
     * Get the 'enabled' attribute.
     * This attribute indicates whether the payment method is enabled (status is 'active').
     */
    public function getEnabledAttribute()
    {
        return $this->status === 'active'; // Check if the status is 'active'.
    }

    /**
     * Scope a query to only include active payment methods.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive(Builder $builder)
    {
        return $builder->where('status', 'active'); // Filter payment methods with 'active' status.
    }
}
