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
    function products()
    {
        $productss=array();
        $productIds=$this->product_ids;
        foreach ($productIds as $ids)
        {
            $prod=Product::find($ids);
            array_push($productss,$prod);
        }
        return $productss;
    }
}
