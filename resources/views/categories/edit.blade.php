@extends('app')

@section('content')
<h1>Categories Edit: {{$category->name}}</h1>

@if($errors->any())
<div class="alert alert-warning">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
     </ul>
</div>
@endif

{!! Form::open(['route'=>['categories.update',$category->id],'method'=>'PUT']) !!}

    <!-- name Form Input -->
    <div class="form-group">
        {!! Form::label('name','Name:') !!}
        {!! Form::text('name',$category->name, ['class'=>'form-control']) !!}
    </div>

    <!-- Description Form Input -->
    <div class="form-group">
        {!! Form::label('description','Description:') !!}
        {!! Form::textarea('description',$category->description, ['class'=>'form-control']) !!}
    </div>

    <!-- Submit Form Input -->
    <div class="form-group">
        {!! Form::submit('Update Category', ['class'=>'form-control btn btn-success']) !!}
    </div>


{!! Form::close() !!}

@endsection