<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $fillable = ['user_id','total','status'];
    
    public function user()
    {	
    	return $this->belongsTo(\CodeCommerce\User::class);
    }

    public function items()
    {
    	return $this->hasMany(\CodeCommerce\OrderItem::class);
    }
}
