@extends('app')

@section('content')
<h1>Products Edit: {{$product->name}}</h1>

@if($errors->any())
<div class="alert alert-warning">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
     </ul>
</div>
@endif

{!! Form::open(['route'=>['products.update',$product->id],'method'=>'PUT']) !!}

    <!-- name Form Input -->
    <div class="form-group">
        {!! Form::label('name','Name:') !!}
        {!! Form::text('name',$product->name, ['class'=>'form-control']) !!}
    </div>

    <!-- Description Form Input -->
    <div class="form-group">
        {!! Form::label('description','Description:') !!}
        {!! Form::textarea('description',$product->description, ['class'=>'form-control']) !!}
    </div>

    <!-- Category Form Input -->
    <div class="form-group">
        {!! Form::label('category_id','Category:') !!}
        {!! Form::select('category_id',$categories, $product->category->id, ['class'=>'form-control']) !!}
    </div>

    <!-- Price Form Input -->
        <div class="form-group">
            {!! Form::label('price','Price:') !!}
            {!! Form::text('price',$product->price, ['class'=>'form-control']) !!}
        </div>

    <!-- Featured Form Input -->
        <div class="form-group">
            {!! Form::label('featured','Featured:') !!}
            {!! Form::checkbox('featured',true,$product->featured) !!}
        </div>

    <!-- Recommend Form Input -->
        <div class="form-group">
            {!! Form::label('recommend','Recommend:') !!}
            {!! Form::checkbox('recommend',true, $product->recommend) !!}
        </div>


    <!-- Submit Form Input -->
    <div class="form-group">
        {!! Form::submit('Update Product', ['class'=>'form-control btn btn-success']) !!}
    </div>


{!! Form::close() !!}

@endsection