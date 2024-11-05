<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Helpers\Badge;

class Role extends Model {
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
    ];

    /**
     * Get the users associated with this role.
     */
    public function users() {
        return $this->hasMany(User::class);
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
            default => Badge::set('secondary', 'NONE'),
        };
    }
}
