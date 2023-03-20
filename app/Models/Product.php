<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'rating',
        'price',
        'category',
        'countInStock',
    ];

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class, 'productId', '_id');
    }
    protected $primaryKey = '_id';
}
