<?php
namespace CodeCommerce\Http\Presenters;
use Laracasts\Presenter\Presenter;

class ProductPresenter extends Presenter {

    public function imageFullName()
    {
        if(count($this->images)){
            return asset('uploads/thumb/'.$this->images->first()->id . '.' . $this->images->first()->extension);
        }
        return asset('images/no-img.jpg');
       
    }
    
    public function priceFormatted()
    {
        return "R$ ".$this->price;
    }
    
    public function statusFeatured()
    {
        return $this->featured == 1 ? 'YES' : 'NO';
    }
    
    public function statusRecommend()
    {
        return $this->recommend == 1 ? 'YES' : 'NO';
    }
    
    public function descriptionShort($limit = 40)
    {
        return str_limit($this->description,$limit);
    }

}
