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
     * Get the customers associated with this bank.
     */
    public function customers() {
        return $this->hasMany(Customer::class);
    }

    /**
     * Get the branches associated with this bank.
     */
    public function branches() {
        return $this->hasMany(Branch::class);
    }

    /**
     * Get the loans associated with this bank.
     */
    public function loans() {
        return $this->hasMany(Loan::class);
    }
}
