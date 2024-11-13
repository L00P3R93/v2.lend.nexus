<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Helpers\Badge;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'phoneNo',
        'role_id',
        'password',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the role associated with the user.
     */
    public function role() {
        return $this->belongsTo(Role::class);
    }

    /**
     * Get the customers associated with this user.
     */
    public function customers() {
        return $this->hasMany(Customer::class);
    }


    /**
     * Get the loans associated with this user.
     */
    public function loans() {
        return $this->hasMany(Loan::class);
    }


    /**
     * Get the refinances associated with this user.
     */
    public function refinances() {
        return $this->hasMany(Refinance::class);
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
            3 => Badge::set('secondary', 'Inactive'),
            default => Badge::set('secondary', 'NONE'),
        };
    }

    static public function getSingle($id){
        return self::find($id);
    }
}
