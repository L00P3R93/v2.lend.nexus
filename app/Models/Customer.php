<?php

namespace App\Models;

use App\Helpers\Badge;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Customer extends Model {
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'other_name',
        'idNo',
        'primaryPhone',
        'secondaryPhone',
        'work_email',
        'dob',
        'gender',
        'business_address',
        'home_address',
        'section',
        'job_type',
        'loan_limit',
        'has_loan',
        'town_id',
        'product_id',
        'bank_id',
        'branch_id',
        'status',
        'comments',
        'user_id'
    ];

    /**
     * Get the user associated with the customer.
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

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

    /**
     * Get the loans associated with the customer.
     */
    public function loans() {
        return $this->hasMany(Loan::class);
    }

    /**
     * Get the refinances associated with the customer.
     */
    public function refinances() {
        return $this->hasMany(Refinance::class);
    }

    /**
     * Get the status associated with the customer.
     */
    public function status() {
        return $this->belongsTo(CustomerStatus::class);
    }

    /**
     * Gets the name of the associated customer
     * @return string
     */
    public function getCustomerName(): string {
        return isset($this->other_name)? "$this->first_name $this->other_name $this->last_name" :"$this->first_name $this->last_name";
    }

    /**
     * Get the status badge HTML for this role.
     *
     * @return string
     */
    public function getStatusBadge(): string {
        return match ($this->status) {
            1 => Badge::set('primary', 'Active'),
            2 => Badge::set('danger', 'Blocked'),
            3 => Badge::set('secondary', 'Confirmed'),
            4 => Badge::set('default', 'Deleted'),
            5 => Badge::set('warning', 'Fraud'),
            6 => Badge::set('info', 'Lead'),
            default => Badge::set('secondary', 'NONE'),
        };
    }

    public function getHasLoanBadge(): string {
        return match ($this->has_loan) {
            0 => Badge::set('default', 'NO'),
            1 => Badge::set('primary', 'YES'),
            default => Badge::set('secondary', 'NONE'),
        };
    }
}
