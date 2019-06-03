<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = "bills";
    public function bill_detail(){
        return $this->hasMany('App\Billdetail','id_bill','id');
    }
    public function customer(){
        return $this->belongsTo('App\Customer','id_customer','id');
    }
}
