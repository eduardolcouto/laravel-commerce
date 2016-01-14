@extends('app')

@section('content')
<h1>Products</h1>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>NAME</th>
            <th>DESCRIPTION</th>
            <th>PRICE</th>
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
            <td>{{$product->description}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->featured}}</td>
            <td>{{$product->recommend}}</td>
            <td>
            <a href="{{route('products.edit',['id'=>$product->id])}}">Edit</a>
            <a href="{{route('products.destroy',['id'=>$product->id])}}">Delete</a>
            </td>
        </tr>
     @endforeach
    </tbody></table>
@endsection