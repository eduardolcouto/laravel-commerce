@extends('store.store')

@section('content')
<section class="checkout">
	<div class="container">
		<div class="jumbotron">
		  <div class="container">
		    <h2>Ordem criada com sucesso!!</h2>
		    <h4>Número da Ordem: {{$order->id}}</h4>
		    <h4>Valor da Ordem: R$ {{$order->total}}</h4>
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
	</div>
	
</section>
@stop
