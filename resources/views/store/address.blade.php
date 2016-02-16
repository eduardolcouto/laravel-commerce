@extends('store.store')

@section('content')

<div class="container">
	
	{!! Form::open() !!}

	{!! Form::hidden('user_id',$user->id, ['class'=>'form-control']) !!}

    <div class="form-group">
        <h4>Type Address</h4>
        {!! Form::radio('type','billing') !!}
        {!! Form::label('type','  Billing') !!}
        
        <br>
        {!! Form::radio('type','delivery') !!}
        {!! Form::label('type','  Delivery') !!}
        
    </div>
	
	<div class="form-group">
        {!! Form::label('zipcode','Zipcode:') !!}
        {!! Form::text('zipcode',null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('address','Address:') !!}
        {!! Form::text('address',null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('city','City:') !!}
        {!! Form::text('city',null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('state','State:') !!}
        {!! Form::text('state',null, ['class'=>'form-control']) !!}
    </div>
	
	<div class="form-group">
        {!! Form::label('country','Country:') !!}
        {!! Form::text('country',null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Save Address', ['class'=>'form-control btn btn-success']) !!}
    </div>

	{!! Form::close() !!}

</div>

@stop
