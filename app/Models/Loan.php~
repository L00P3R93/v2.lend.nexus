<?php

namespace App\Models;

use App\Helpers\Badge;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Loan extends Model {
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'customer_id',
        'customer_phone',
        'given_date',
        'due_date',
        'loan_amount',
        'loan_interest',
        'processing_fee',
        'loan_total',
        'late_penalty',
        'loan_penalty_freq',
        'bounce_cheque',
        'recovery_fee',
        'penalty_total',
        'initial_pen_total',
        'product_id',
        'bank_id',
        'loan_period',
        'user_id',
        'comments',
        'status_id',
        'section',
        'roll_state',
        'roll_state_ok',
        'roll_over',
        'new_loan',
        'old_loan',
    ];

    /**
     * Get the customer associated with the loan.
     */
    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get the product associated with the loan.
     */
    public function product() {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the bank associated with the loan.
     */
    public function bank() {
        return $this->belongsTo(Bank::class);
    }

    /**
     * Get the user associated with the loan.
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the status associated with the loan.
     */
    public function status() {
        return $this->belongsTo(LoanStatus::class);
    }

    /**
     * Get the refinances associated with this loan.
     */
    public function refinances() {
        return $this->hasMany(Refinance::class);
    }

    public function getStatusBadge(): string {
        return match ($this->status_id) {
            1 => Badge::set('primary', $this->status->name),
            2 => Badge::set('danger', $this->status->name),
            3 => Badge::set('secondary', $this->status->name),
            4 => Badge::set('default', $this->status->name),
            5 => Badge::set('warning', $this->status->name),
            6 => Badge::set('info', $this->status->name),
            default => Badge::set('secondary', 'NONE'),
        };
    }
}
