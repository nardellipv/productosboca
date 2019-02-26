<?php

namespace productosboca;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $fillable = [
        'email','name','lastname','address','state','city','postalcode','phone','note','status','payment'
    ];
}
