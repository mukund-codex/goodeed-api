<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Sanctum\HasApiTokens;

class Order extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'restaurant_id',
        'dishes_id',
        'address_id',
        'order_number',
        'quantity',
        'price',
        'discount_price',
        'total_price',
        'status',
        'payment_status',
        'payment_mode',
        'transaction_id',
        'payment_response',
        'delivery_time',
        'delivery_date',
        'delivery_charge',
        'tax',
        'discount',
        'tip',
        'total_amount',
        'order_type',
        'order_placed_at',
        'accepted_at',
        'rejected_at',
        'preparing_at',
        'dispatched_at',
        'delivered_at',
        'cancelled_at',
        'reason_for_cancellation',
        'cancellation_by',
        'rating',
        'cancellation_status',
        'review',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function dishes(): BelongsTo
    {
        return $this->belongsTo(Dishes::class);
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }


}
