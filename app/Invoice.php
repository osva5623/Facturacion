<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable=[
        'total_price',
        'total_tax'
    ];

   public function detail(){
       return $this->hasMany(Shopping::class,'invoiced');
   }
}
