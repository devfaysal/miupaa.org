<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $guarded = [];
    
    protected $casts = [
        'value'   => 'array',
    ];
}
