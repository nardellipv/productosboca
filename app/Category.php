<?php

namespace productosboca;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function Product()
    {
        return $this->hasMany(Product::class);
    }
}
