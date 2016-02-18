@extends('store.store')

@section('content')

<div class="container">
	
	{!! Form::open(['route'=>'account.address.save']) !!}

	{!! Form::hidden('user_id',$user->id, ['class'=>'form-control']) !!}
	<fieldset>
		<legend>
			<h3>Delivery Address</h3>
		</legend>
		<div class="form-group">
        	{!! Form::label('delivery[zipcode]','Zipcode') !!}
       		{!! Form::text('delivery[zipcode]',null, ['class'=>'form-control']) !!}
	    </div>

	    <div class="form-group">
	        {!! Form::label('delivery[address]','Address') !!}
	        {!! Form::text('delivery[address]',null, ['class'=>'form-control']) !!}
	    </div>

	    <div class="form-group">
	        {!! Form::label('delivery[city]','City') !!}
	        {!! Form::text('delivery[city]',null, ['class'=>'form-control']) !!}
	    </div>

	    <div class="form-group">
	        {!! Form::label('delivery[state]','State:') !!}
	        {!! Form::text('delivery[state]',null, ['class'=>'form-control']) !!}
	    </div>
		
		<div class="form-group">
	        {!! Form::label('delivery[country]','Country') !!}
	        {!! Form::text('delivery[country]',null, ['class'=>'form-control']) !!}
	    </div>
	</fieldset>
	<hr>
	<fieldset>
		<legend>
			<h3>
				Billing Address
			</h3>
		</legend>
		<span>
				<input type="checkbox" id="useSameDelivery">
				Use the same Delivery Address
		</span>
		<br>
		<div class="form-group">
        	{!! Form::label('billing[zipcode]','Zipcode') !!}
       		{!! Form::text('billing[zipcode]',null, ['class'=>'form-control']) !!}
	    </div>

	    <div class="form-group">
	        {!! Form::label('billing[address]','Address') !!}
	        {!! Form::text('billing[address]',null, ['class'=>'form-control']) !!}
	    </div>

	    <div class="form-group">
	        {!! Form::label('billing[city]','City') !!}
	        {!! Form::text('billing[city]',null, ['class'=>'form-control']) !!}
	    </div>

	    <div class="form-group">
	        {!! Form::label('billing[state]','State') !!}
	        {!! Form::text('billing[state]',null, ['class'=>'form-control']) !!}
	    </div>
		
		<div class="form-group">
	        {!! Form::label('billing[country]','Country') !!}
	        {!! Form::text('billing[country]',null, ['class'=>'form-control']) !!}
	    </div>

	</fieldset>

	

    <div class="form-group">
        {!! Form::submit('Save Address', ['class'=>'form-control btn btn-success']) !!}
    </div>

	{!! Form::close() !!}

</div>

@stop


@section('filesJs')
	<script src="{{elixir('js/address.js')}}"></script>
@endsection