<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Customer extends Model {
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'other_names',
    ];

    /**
     * Get the product associated with the customer.
     */
    public function product() {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the bank associated with the customer.
     */
    public function bank() {
        return $this->belongsTo(Bank::class);
    }

    /**
     * Get the branch associated with the customer.
     */
    public function branch() {
        return $this->belongsTo(Branch::class);
    }

    /**
     * Get the town associated with the customer.
     */
    public function town() {
        return $this->belongsTo(Town::class);
    }
}
