<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class ProductImage extends Model
{
    //
    
    protected $presenter = '\CodeCommerce\Http\Presenters\ImagePresenter';
    
    use PresentableTrait;
    
    protected $fillable = ['product_id','extension'];

    public function product()
    {
    	return $this->belongsTo(\CodeCommerce\Product::class);
    }

    public function getImageNameAttribute()
    {
        return $this->id .'.'. $this->extension;
    }

}
