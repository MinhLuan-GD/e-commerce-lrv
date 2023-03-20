<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'userId',
        'status',
        'shippingAddress',
        'paymentMethod',
        'itemsPrice',
        'shippingPrice',
        'totalPrice',
        'isDelivered',
        'deliveredAt',
    ];

    protected $casts = [
        'deliveredAt' => 'datetime',
    ];

    public function cart(): HasMany
    {
        return $this->hasMany(Cart::class);
    }
    protected $primaryKey = '_id';
}
