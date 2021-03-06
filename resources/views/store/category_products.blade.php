@extends('store.store')

@section('categories')
	@include('store.partial.categories')
@stop

@section('content')
<div class="col-sm-9 padding-right">
	<h2 class="title text-center">Products of Category {{ $category->name }}</h2>
	    @include('store.partial.products',['products' => $category->products])
</div>
@stop