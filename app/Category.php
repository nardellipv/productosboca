<?php

namespace bocaamerica;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'status', 'slug'
    ];

    public function Product()
    {
        return $this->hasMany(Product::class);
    }
}
