<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerDetail extends Model
{
    protected $guarded=[];

    function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
