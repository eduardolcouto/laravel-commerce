@extends('app')

@section('content')
<h1>Order #{{$order->id}}</h1>

@if($errors->any())
<div class="alert alert-warning">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
     </ul>
</div>
@endif

{!! Form::open(['route'=>['orders.update',$order->id],'method'=>'PUT']) !!}

    <!-- status Form Input -->
    <div class="form-group">
        {!! Form::label('status','New Status:') !!}
        {!! Form::select('status',$listStatus, $statusAtual , ['class'=>'form-control']) !!}
    </div>
        <!-- Submit Form Input -->
    <div class="form-group">
        {!! Form::submit('Change Status', ['class'=>'form-control btn btn-warning']) !!}
    </div>

{!! Form::close() !!}

@endsection