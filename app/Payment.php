<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $casts=[
        'product_ids'=>'array',
        'quantities'=>'array',
    ];
    protected $guarded=[];

    function customer()
    {
        return $this->belongsTo(CustomerDetail::class);
    }
}
