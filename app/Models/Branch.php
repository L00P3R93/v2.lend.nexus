<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Branch extends Model {
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $table = 'bank_branches';

    protected $fillable = [
        'name',
        'bank_id',
        'town_id',
        'status'
    ];

    /**
     * Get the customers associated with this branch.
     */
    public function customers() {
        return $this->hasMany(Customer::class);
    }

    /**
     * Get the branches associated with this bank.
     */
    public function bank() {
        return $this->belongsTo(Bank::class);
    }
}
