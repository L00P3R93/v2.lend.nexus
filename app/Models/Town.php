<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Town extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'county_id',
        'status',
    ];

    /**
     * Get the customers associated with this town.
     */
    public function customers() {
        return $this->hasMany(Customer::class);
    }

    /**
     * Get the branches associated with this town.
     */
    public function branches() {
        return $this->hasMany(Branch::class);
    }

    /**
     * Get the county associated with this town.
     */
    public function county() {
        return $this->belongsTo(County::class);
    }
}
