@extends('app')

@section('content')
<h1>Categories Create</h1>

@if($errors->any())
<div class="alert alert-warning">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
     </ul>
</div>
@endif

{!! Form::open(['route'=>'categories.store']) !!}

    <!-- name Form Input -->
    <div class="form-group">
        {!! Form::label('name','Name:') !!}
        {!! Form::text('name',null, ['class'=>'form-control']) !!}
    </div>

    <!-- Description Form Input -->
    <div class="form-group">
        {!! Form::label('description','Description:') !!}
        {!! Form::textarea('description',null, ['class'=>'form-control']) !!}
    </div>

    <!-- Submit Form Input -->
    <div class="form-group">
        {!! Form::submit('Add Category', ['class'=>'form-control btn btn-primary']) !!}
    </div>


{!! Form::close() !!}

@endsection