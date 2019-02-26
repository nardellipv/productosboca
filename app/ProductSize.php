<?php

namespace productosboca;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    public $timestamps = false;

    public function Size()
    {
        return $this->belongsTo(Size::class);
    }

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }
}
