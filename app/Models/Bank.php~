<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Bank extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'pay_day'
    ];

    /**
     * Get the customers associated with this product.
     */
    public function customers() {
        return $this->hasMany(Customer::class);
    }

    /**
     * Get the customers associated with this product.
     */
    public function branches() {
        return $this->hasMany(Branch::class);
    }
}
