<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class AddressUser extends Model
{
    protected $fillable = [
    	'user_id',
    	'type',
    	'address',
    	'country',
    	'city',
    	'state',
    	'zipcode',
    ];

    public function user()
    {
    	return $this->belongsTo(\CodeCommerce\User::class);
    }

    
}
