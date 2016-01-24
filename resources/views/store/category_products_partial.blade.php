<h2>Products of Category {{ $category->name }}</h2>
<div class="col-sm-9 padding-right">
    
        @foreach($category->products as $product)
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        @if(count($product->images))
                            <img src="{{asset('uploads/thumb/'.$product->present()->imageFullName)}}" alt="" />
                        @else
                            <img src="{{asset('images/no-img.jpg')}}" alt="" />
                        @endif
                        <h2>{{$product->present()->priceFormatted}}</h2>
                        <p>{{$product->name}}</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <h2>{{$product->present()->priceFormatted}}</h2>
                            <p>{{$product->name}}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
 
    

</div>