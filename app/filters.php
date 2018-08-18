<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class filters extends Model
{
    protected $fillable = ['filter_id', 'filterName','subCategoryId','author','type','filterFor','brand_id'];
}
