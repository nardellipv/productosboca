<?php

namespace bocaamerica;

use Illuminate\Database\Eloquent\Model;

class NewsLetter extends Model
{
    protected $fillable = [
        'name', 'email'
    ];
}
