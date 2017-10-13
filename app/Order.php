<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id'];

    public function products(){
        return $this->hasOne(Product::class,'id','product_id');
    }
    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
