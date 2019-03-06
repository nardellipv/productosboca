<?php

namespace bocaamerica;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }
}
