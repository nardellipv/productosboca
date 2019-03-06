<?php

namespace bocaamerica;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = [
        'name', 'url', 'product_id'
    ];

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }
}
