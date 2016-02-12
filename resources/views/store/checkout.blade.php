@extends('store.store')

@section('content')
<section class="checkout">
	<div class="container">
		@if(!isset($cartEmpty))
		<div class="jumbotron">
		  <div class="container">
		    <h2>Pedido criada com sucesso!!</h2>
		    <h4>Número do Pedido #{{$order->id}}</h4>
		    <h4>Valor do Pedido: R$ {{$order->total}}</h4>
		  </div>
		</div>
		<table class="table table-condensed">
		    	<thead>
		    		<tr>
		    			<th colspan="6">
		    				Itens da sua ordem
		    			</th>
		    			
		    		</tr>
		    	</thead>
		    	<tbody>
		    	@foreach($order->items as $item)
		    		<tr>
		    			<td>
		    				<img src="{{$item->product->present()->imageFullName}}" width=80 alt="">
		    			</td>
		    			<td>
		    				<p>{{$item->product->name}}</p>
		    				<span>Código: {{$item->product->id}}</span>
		    			</td>
		    			<td>{{$item->qtd}}</td>
		    			<td>R$ {{$item->price}}</td>
		    		</tr>
		    	@endforeach
		    	</tbody>
		    </table>
		    @else

		    @section('categories')
				@include('store.partial.categories')
			@stop
			<div class="col-sm-9 padding-right">
		    	<h2>Carrinho de compras vazio!!</h2>
		    </div>

		    @endif

	</div>
	
</section>
@stop
