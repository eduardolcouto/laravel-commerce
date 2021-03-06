@extends('app')

@section('content')
<h1>Products</h1>
<a href="{{ route('products.create') }}" class="btn btn-primary">Create New Product</a>
<br />
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>NAME</th>
            <th>DESCRIPTION</th>
            <th>PRICE</th>
            <th>CATEGORY</th>
            <th>FEATURED</th>
            <th>RECOMMEND</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
     @foreach($products as $product)
        <tr>

            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->present()->descriptionShort}}</td>
            <td>{{$product->present()->priceFormatted}}</td>
            <td>{{$product->category->name}}</td>
            <td>
                {{ $product->present()->statusFeatured }}
            </td>
            <td>
                {{ $product->present()->statusRecommend }}
            </td>
            <td>
            <a href="{{route('products.edit',['id'=>$product->id])}}" class="btn btn-warning btn-sm">Edit</a>
            <a href="{{route('products.destroy',['id'=>$product->id])}}" class="btn btn-danger btn-sm">Delete</a>
            <a href="{{route('products.images',['id'=>$product->id])}}" class="btn btn-default btn-sm">Images <span class="badge">{{$product->images->count()}}</span></a>
            </td>
        </tr>
     @endforeach
    </tbody></table>
    {!! $products->render() !!}
@endsection