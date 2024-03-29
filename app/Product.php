<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
     
    public function type_products()
    {

        return $this->belongsTo('App\ProductType','id_type','id');
    }
    public function bill_detail(){
        return $this->hasMany('App\Product','id_product','id');

    }
}
