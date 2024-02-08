<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;

class Restaurant extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = 'restaurants';

    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'is_active',
        'verified',
        'verified_at'
    ];

    protected $casts = [
        'verified_at' => 'datetime'
    ];

    public function dishes(): HasMany
    {
        return $this->hasMany(Dishes::class);
    }
}
