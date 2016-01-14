@extends('app')

@section('content')
<h1>Categories</h1>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>NAME</th>
            <th>DESCRIPTION</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
     @foreach($categories as $category)
        <tr>

            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->description}}</td>
            <td>
            <a href="{{route('categories.edit',['id'=>$category->id])}}">Edit</a>
            <a href="{{route('categories.destroy',['id'=>$category->id])}}">Delete</a>
            </td>
        </tr>
     @endforeach
    </tbody></table>
@endsection