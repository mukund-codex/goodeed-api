<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;

class Dishes extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = 'dishes';

    protected $fillable = [
        'restaurant_id',
        'name',
        'description',
        'is_veg',
        'is_active',
        'verified',
        'image',
        'price',
        'discount_price'
    ];

    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
