<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'productId',
        'imageUrl',
        'isMain'
    ];
    protected $primaryKey = '_id';
}
