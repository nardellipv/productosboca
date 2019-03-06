<?php

namespace bocaamerica;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = [
        'coupon','discount','status'
    ];
}
