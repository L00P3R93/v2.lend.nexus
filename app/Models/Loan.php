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

    /**
     * Get the payments associated with this loan.
     */
    public function payments() {
        return $this->hasMany(Payment::class);
    }

    /**
     * Calculates the loan interest and total amount given a loan amount.
     *
     * @param int $loan_amount
     * @return array
     */
    public static function calculate(int $loan_amount): array {
        $loan_interest = round($loan_amount * 0.25);
        $loan_total = $loan_amount + $loan_interest;
        $processing_fee = 0;
        return [
            'loan_interest' => $loan_interest,
            'loan_total' => $loan_total,
            'processing_fee' => $processing_fee,
        ];
    }

    public function getBalance(){
        return $this->loan_total - $this->payments()->sum('amount');
    }

    public function getPrincipalBalance(){
        $loan_balance = $this->getBalance();
        return ($loan_balance >= $this->loan_amount)? $this->loan_amount : $loan_balance;
    }

    public function getRefinanceableAmount(){
        return ($this->customer->loan_limit - $this->getPrincipalBalance());
    }

    public function getStatusBadge(): string {
        return match ($this->status_id) {
            1 => Badge::set('primary bg-gradient-primary', $this->status->name), //Pending Verification
            2 => Badge::set('success bg-gradient-olive', $this->status->name), //Pending Confirmation
            3, 9 => Badge::set('secondary bg-gradient-secondary', $this->status->name), //Pending Approval, Failed
            4 => Badge::set('primary bg-gradient-navy', $this->status->name), //Pending Disbursement
            5 => Badge::set('success bg-gradient-success', $this->status->name), //Disbursed
            6, 10, 11, 12 => Badge::set('default', $this->status->name), //Cleared, Written-Off, Deleted, Cancelled
            7 => Badge::set('warning bg-gradient-warning', $this->status->name), //Overdue
            8 => Badge::set('danger', $this->status->name), //Past Overdue
            default => Badge::set('secondary bg-gradient-secondary', 'NONE'),
        };
    }
}
