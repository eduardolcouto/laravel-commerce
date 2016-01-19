@extends('app')

@section('content')
<h1>Products Create</h1>

@if($errors->any())
<div class="alert alert-warning">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
     </ul>
</div>
@endif

{!! Form::open(['route'=>'products.store']) !!}

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

     <!-- Category Form Input -->
    <div class="form-group">
        {!! Form::label('category_id','Category:') !!}
        {!! Form::select('category_id',$categories, null, ['class'=>'form-control']) !!}
    </div>

    <!-- Price Form Input -->
        <div class="form-group">
            {!! Form::label('price','Price:') !!}
            {!! Form::text('price',null, ['class'=>'form-control']) !!}
        </div>

    <!-- Featured Form Input -->
        <div class="form-group">
            {!! Form::label('featured','Featured:') !!}
            {!! Form::checkbox('featured',true) !!}
        </div>

    <!-- Recommend Form Input -->
        <div class="form-group">
            {!! Form::label('recommend','Recommend:') !!}
            {!! Form::checkbox('recommend',true) !!}
        </div>


    <!-- Submit Form Input -->
    <div class="form-group">
        {!! Form::submit('Add Product', ['class'=>'form-control btn btn-primary']) !!}
    </div>


{!! Form::close() !!}

@endsection