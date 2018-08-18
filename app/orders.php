<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
     protected $fillable = ['orderNumber', 
     'email', 
     'accountType',
     'name',
     'tax',
     'totalAmount',
     'address',
     'address_2',
     'city',
     'state',
     'zip',
     'phoneNumber',
     'emailStatus',
     'ediStatus',
     'transactionStatus',
     'orderStatus',
     'redeemStatus',
     'redeemName',
     'redeemType',
     'redeemDiscount'];

}
