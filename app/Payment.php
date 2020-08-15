<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded=[];

    function customer()
    {
        return $this->belongsTo(CustomerDetail::class);
    }
}
