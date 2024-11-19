<?php

namespace App\Models;

use App\Helpers\Badge;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Payment extends Model {
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'loan_id',
        'customer_id',
        'product_id',
        'phone',
        'amount',
        'payment_method',
        'date_received',
        'receipt',
        'status'
    ];

    /**
     * Get the loan associated with the payment.
     */
    public function loan() {
        return $this->belongsTo(Loan::class);
    }

    /**
     * Get the customer associated with the payment.
     */
    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get the product associated with the payment.
     */
    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function getStatusBadge() {
        return Badge::set('info', 'OK');
    }
}
