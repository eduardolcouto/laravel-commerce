@extends('store.store')

@section('categories')
	@include('store.partial.categories')
@stop

@section('content')
    
<div class="col-sm-9 padding-right">
    <div class="product-details"><!--product-details-->
        <div class="col-sm-5">
            <div class="view-product">
                <img src="{{$product->present()->imageFullName}}" alt="" />
            </div>
            <div id="similar-product" class="carousel slide" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                    	@foreach($product->images as $image)      
                        	<a href="#"><img src="{{asset('uploads/'.$image->imageName)}}" alt="" width="80"></a>                 	
                   		
                   		@endforeach
                    </div>

                </div>

            </div>
        </div>
        <div class="col-sm-7">
            <div class="product-information"><!--/product-information-->

                <h2>{{$product->name}} :: {{$product->category->name}}</h2>

                <p>{{$product->description}}</p>
                <span>
                    <span>{{$product->present()->priceFormatted}}</span>
                        <a href="{{route('cart.add',['id' => $product->id])}}" class="btn btn-fefault cart">
                            <i class="fa fa-shopping-cart"></i>
                            Adicionar no Carrinho
                        </a>
                </span>
                <span>
                    Tags:
                    @foreach($product->tags as $tag)
                        <a class="label label-primary" href="{{route('show.tag.products',$tag->id)}}">{{$tag->name}}</a>
                    @endforeach
                </span>
            </div>
            <!--/product-information-->
        </div>
    </div>
    <!--/product-details-->
</div>
@stop