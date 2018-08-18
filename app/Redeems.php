<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Redeems extends Model{

	protected $table = 'redeems';
    protected $fillable = ['redeemName', 'redeemType', 'redeemDiscountType','redeemDiscount','minimumAmountRequire','usageAllow'];
}
