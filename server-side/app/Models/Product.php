<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'image',
        'image_mime',
        'image_size',
        'description',
        'price',
        'created_by',
        'updated_by'
    ];

    public function cartItem(): HasOne
    {
        return $this->hasOne(CartItem::class);
    }
}
