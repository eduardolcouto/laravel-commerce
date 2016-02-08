@extends('store.store')

@section('categories')
	@include('store.partial.categories')
@stop

@section('content')
<div class="col-sm-9 padding-right">
	<h2 class="title text-center">Products of Tag {{ $tag->name }}</h2>
	    @include('store.partial.products',['products' => $tag->products])
</div>
@stop