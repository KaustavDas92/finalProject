<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded=[];

    function user()
    {
        return $this->belongsTo(User::class);
    }
    function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
