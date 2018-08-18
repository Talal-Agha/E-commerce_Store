<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProducts extends Model{
     protected $fillable = ['orderNumber', 
     'email', 
     'product_Id',
     'name',
     'quantity',
     'price',
     'redeemStatus',
     "redeemDiscount",
     "updated_at"];
}
