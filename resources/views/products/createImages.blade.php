@extends('app')

@section('content')
<h1>Upload Imagens for {{$product->name}}</h1>

@if($errors->any())
<div class="alert alert-warning">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
     </ul>
</div>
@endif

{!! Form::open(['route'=>['products.images.store',$product->id],'method'=>'POST','enctype'=>'multipart/form-data']) !!}

    <!-- name Form Input -->
    <div class="form-group">
        {!! Form::label('image','Image:') !!}
        {!! Form::file('image', ['class'=>'form-control']) !!}
    </div>

    

    <!-- Submit Form Input -->
    <div class="form-group">
        {!! Form::submit('Upload Images', ['class'=>'form-control btn btn-primary']) !!}
    </div>


{!! Form::close() !!}

@endsection