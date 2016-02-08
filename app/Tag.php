<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

   	public function products()
   	{
   		return $this->belongsToMany(\CodeCommerce\Product::class);
   	}

   	public function setNameAttribute($value)
   	{	
   		$this->attributes['name'] = strtolower($value);
   	}
}
