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
        'work_address',
        'section',
        'job_type',
        'loan_limit',
        'town_id',
        'product_id',
        'bank_id',
        'branch_id',
        'status',
        'comments'
    ];

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
        return "$this->first_name $this->last_name";
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
}
