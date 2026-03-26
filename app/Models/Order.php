<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Order extends Model
{
    protected $fillable = ['user_id', 'metodo_pago'];

    // Relación muchos a muchos con Product a través de order_product
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product')
                    ->withPivot('price', 'cantidad')
                    ->withTimestamps();
    }
}
