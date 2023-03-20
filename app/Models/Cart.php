<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'price',
        'orderId',
        'productId',
        'quantity',
    ];

    protected $primaryKey = '_id';
}
