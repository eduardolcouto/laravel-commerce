@extends('store.store')

@section('content')
<h3>My Orders</h3>

<table class="table">
	<tr>
		<th>#ID</th>
		<th>Items</th>
		<th>Total</th>
		<th>Status</th>
	</tr>
	@foreach($orders as $order)
	<tr>
		<td>{{$order->id}}</td>
		<td>
			<ul>
			@foreach($order->items as $item)
				<li>
					<img src="{{$item->product->present()->imageFullName}}" alt="" width="80">
					<p>
						<a href="{{route('show.product',['id' => $item->product->id ])}}">{{$item->product->name}}</a>
					</p>
				</li>
			@endforeach
			</ul>
		</td>
		<td>{{$order->total}}</td>
		<td>{{$order->status}}</td>
	</tr>
	@endforeach
</table>
@stop
