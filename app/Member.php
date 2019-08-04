<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $guarded = [];

    protected $casts = [
        'dob' => 'datetime:Y-m-d',
    ];

    // public function getDobDayAttribute()
    // {
    //     return $this->dob ? $this->dob->format('d') : '';
    // }

    // public function getDobMonthAttribute()
    // {
    //     return $this->dob ? $this->dob->format('m') : '';
    // }

    // public function getDobYearAttribute()
    // {
    //     return $this->dob ? $this->dob->format('Y') : '';
    // }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
