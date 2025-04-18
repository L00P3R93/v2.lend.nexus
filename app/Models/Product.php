<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'rate'
    ];

    /**
     * Get the customers associated with this product.
     */
    public function customers() {
        return $this->hasMany(Customer::class);
    }

    /**
     * Get the loans associated with this product.
     */
    public function loans() {
        return $this->hasMany(Loan::class);
    }

    /**
     * Get the payments associated with this product.
     */
    public function payments() {
        return $this->hasMany(Payment::class);
    }
}
