<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class Product extends Model
{
    use PresentableTrait;
    
    protected $presenter = '\CodeCommerce\Http\Presenters\ProductPresenter';
    
    protected $fillable = ['category_id','name','description','price','featured','recommend'];

    public function category()
    {
    	return $this->belongsTo(\CodeCommerce\Category::class);
    }

    public function images()
    {
    	return $this->hasMany(\CodeCommerce\ProductImage::class);
    }

    public function tags()
    {
    	return $this->belongsToMany(\CodeCommerce\Tag::class);
    }

    public function getTagListAttribute()
   	{
   		return implode(', ',$this->tags->lists('name')->all());
   	}
   	
   	public function scopeFeatured($query)
   	{
   	    return $query->where('featured','=','1');
   	}
   	
   	public function scopeRecommend($query)
   	{
   	    return $query->where('recommend','=','1');
   	}

    public function scopeOfCategory($query, $type)
    {
      return $query->where('category_id','=',$type);
    }          
}
