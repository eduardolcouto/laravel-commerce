<div class="col-sm-9 padding-right">
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Em destaque</h2>
        @foreach($pFeatureds as $featured)
        {{ $featured->images->first()->getImageName() }}
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{asset('uploads/thumb')}}/" alt="" />
                        <h2>{{$featured->price}}</h2>
                        <p>{{$featured->name}}</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <h2>{{$featured->price}}</h2>
                            <p>{{$featured->name}}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div><!--features_items-->


    <div class="features_items"><!--recommended-->
        <h2 class="title text-center">Recomendados</h2>
         @foreach($pRecommends as $recommend)
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="http://commerce.dev:10088/images/no-img.jpg" alt="" width="200"/>
                        <h2>R$ 14,00</h2>
                        <p>quasi</p>
                        <a href="http://commerce.dev:10088/product/4" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                        <h2>R$ 14</h2>
                        <p>quasi</p>
                        <a href="http://commerce.dev:10088/product/4" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                        <a href="http://commerce.dev:10088/cart/4/add" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div><!--recommended-->
</div>