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
                <img src="{{url('/uploads/'.$image->id.'.'.$image->extension)}}" alt="" width="120" class="img-thumbnail">

            </td>
            <td>{{$image->extension}}</td>
            <td>
                <a href="{{route('products.images.destroy',['id'=>$image->id])}}" class="btn btn-sm btn-danger">Delete</a>
            </td>
        </tr>
     @endforeach
    </tbody></table>
    <a href="{{route('products.index')}}" class="btn btn-default">Voltar</a>

@endsection