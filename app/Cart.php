<?php

namespace bocaamerica;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function Product()
    {
        return $this->belongsTo(Product::class);
    }
}
