<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Refinance extends Model {
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'loan_id',
        'customer_id',
        'amount',
        'due_date',
        'customer_phone',
        'user_id',
        'receipt',
        'status',
    ];

    /**
     * Get the loan associated with the refinance.
     */
    public function loan() {
        return $this->belongsTo(Loan::class);
    }

    /**
     * Get the customer associated with the refinance.
     */
    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get the customer associated with the refinance.
     */
    public function user() {
        return $this->belongsTo(User::class);
    }
}
