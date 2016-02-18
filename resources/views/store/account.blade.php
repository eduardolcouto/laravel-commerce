@extends('store.store')

@section('content')
<div class="container">
	
	<div class="row">
		
		<div class="col-md-8">
			<h1>{{$user->name}}</h2>
			<p>Email: {{$user->email}}</p>
		</div>
		<div class="col-md-4">
			<ul>
				<li><a href="{{route('account.orders')}}">My Orders</a></li>
			</ul>
		</div>

	</div>
<hr>
	<div class="row">
		<div class="col-md-12">
		<h3>Address</h3>
		@if(!isset($delivery) && !isset($billing))
			<a href="{{route('account.address')}}" class="btn btn-default">Add Address</a>
		@endif
		<dic class="row">
			<div class="col-md-6">
				<h4>Delivery</h4>
				@if(isset($delivery))
				<p><label>Address:</label> {{ $delivery->address }}</p>
				<p><label>ZipCode:</label> {{ $delivery->zipcode }}</p>
				<p><label>City:</label> {{ $delivery->city }}</p>
				<p><label>State:</label> {{ $delivery->state }}</p>
				<p><label>Country:</label> {{ $delivery->country }}</p>
				<p>
					<a href="#">Edit</a>
				</p>
			@else
				<p>Nenhum endereço de entrega cadastrado</p>
			@endif
			</div>
			<div class="col-md-6">
				<h4>Billing</h4>
				@if(isset($delivery))
				<p><label>Address:</label> {{ $billing->address }}</p>
				<p><label>ZipCode:</label> {{ $billing->zipcode }}</p>
				<p><label>City:</label> {{ $billing->city }}</p>
				<p><label>State:</label> {{ $billing->state }}</p>
				<p><label>Country:</label> {{ $billing->country }}</p>
				<p>
					<a href="#">Edit</a>
				</p>
			@else
				<p>Nenhum endereço de cobrança cadastrado</p>

			@endif
			</div>
		</dic>
				
		</div>	
	</div>


</div>
@stop
