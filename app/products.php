<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model{
    protected $fillable = ['product_id', 
    'name', 
    'thumbnail', 
    'description', 
    'features',
    'price',
    'sale_status', 
    'sale_price',
    'sku',
    'upc',
    'brand',
    'filter',
    'availability',
    'productCondition',
    'currency',
    'heightValue',
    'heightUnit',
    'lenthValue',
    'lenthUnit',
    'weightValue',
    'weightUnit',
	'widthValue',
	'widthUnit',
    'category', 
    'quantity',
    'available',
    'checkForUpdates',
    'author',
    'created_at',
    'updated_at'];
}
