<?php

namespace productosboca;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'name', 'price', 'offer','quantity','description','section','photo','slug','time_offer','category_id'
    ];


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

    public function User()
    {
        return $this->hasMany(User::class);
    }

    public function Picture()
    {
        return $this->hasMany(Picture::class);
    }

}
