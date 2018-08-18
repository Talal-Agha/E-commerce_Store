<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subCategories extends Model
{
    protected $fillable = ['categoryId', 'subCategoryId', 'subCategoryName'];
}
