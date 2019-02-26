<?php

namespace productosboca;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function Size()
    {
        return $this->hasMany(Size::class);
    }

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function Review()
    {
        return $this->hasMany(Review::class);
    }

    public function Cart()
    {
        return $this->hasMany(Cart::class);
    }
}
