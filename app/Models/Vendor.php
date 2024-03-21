<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Vendor extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guard = 'vendor'; // 'vendor' is the name of the guard in config/auth.php

    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile_number',
        'image',
        'status',
        'is_email_verified',
        'email_verified_at',
        'is_mobile_verified',
        'is_active',
        'is_deleted',
        'is_blocked',
        'type'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function address(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    public function restaurant(): HasMany
    {
        return $this->hasMany(Restaurant::class);
    }
}
