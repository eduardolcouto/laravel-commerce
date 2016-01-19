@extends('app')

@section('content')
<h1>Images of {{$product->name}}</h1>
<a href="{{ route('products.images.create',$product->id) }}" class="btn btn-primary">Upload Image</a>
<br />
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th></th>
            <th>EXTENSION</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
     @foreach($product->images as $image)
        <tr>

            <td>{{$image->id}}</td>
            <td>
                <img src="{{url('/uploads/'.$image->id.'.'.$image->extension)}}" alt="" style="width:200px;">
            </td>
            <td>{{$image->extension}}</td>
            <td>
                <a href="{{route('products.edit',['id'=>$image->product->id])}}">Edit</a>
                <a href="{{route('products.destroy',['id'=>$image->product->id])}}">Delete</a>
            </td>
        </tr>
     @endforeach
    </tbody></table>

@endsection