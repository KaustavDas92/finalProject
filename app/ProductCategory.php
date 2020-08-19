<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $guarded=[];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function mens()
    {
        return $this->products()->where('gender','=','male')->exists();
    }
    public function womens()
    {
        return $this->products()->where('gender','=','female')->exists();
    }
}
