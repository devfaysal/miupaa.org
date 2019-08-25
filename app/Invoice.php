<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $guarded = [];

    public function path()
    {
        return "/members/{$this->member->id}/invoices/{$this->id}";
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
