<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productImages extends Model
{
    protected $fillable = ['product_id', 'productImages', 'productImagesSize','created_at','updated_at'];
}
