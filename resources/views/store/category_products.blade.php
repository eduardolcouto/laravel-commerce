@extends('store.store')

@section('categories')
	@include('store.categories_partial')
@stop

@section('content')
    @include('store.category_products_partial')
@stop