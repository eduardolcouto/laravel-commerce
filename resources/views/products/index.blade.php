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
            <td>{{str_limit($product->description,35)}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->category->name}}</td>
            <td>
                @if($product->featured)
                    YES
                @ELSE
                    NO
                @endif
            </td>
            <td>
                @if($product->recommend)
                    YES
                @ELSE
                    NO
                @endif
            </td>
            <td>
            <a href="{{route('products.edit',['id'=>$product->id])}}">Edit</a>
            <a href="{{route('products.destroy',['id'=>$product->id])}}">Delete</a>
            </td>
        </tr>
     @endforeach
    </tbody></table>
    {!! $products->render() !!}
@endsection