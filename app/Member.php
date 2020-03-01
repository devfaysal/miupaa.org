<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $guarded = [];

    protected $casts = [
        'dob' => 'datetime:Y-m-d',
    ];

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
