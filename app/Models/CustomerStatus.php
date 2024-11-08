<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class CustomerStatus extends Model{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $table = 'customer_status';

    protected $fillable = [
        'name'
    ];

    /**
     * Get the customers associated with this status.
     */
    public function statuses() {
        return $this->hasMany(Customer::class);
    }
}
