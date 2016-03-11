@extends('app')
@section('content')
<h3>My Orders</h3>

<table class="table">
    <tr>
        <th>#ID</th>
        <th>Customer</th>
        <th>Items</th>
        <th>Total</th>
        <th>Status</th>
        <th></th>
    </tr>
    @foreach($orders as $order)
    <tr>
        <td>{{$order->id}}</td>
        <td>{{$order->user->name}}</td>
        <td>
            <ul>
            @foreach($order->items as $item)
                <li>
                    <p>
                        <a href="{{route('show.product',['id' => $item->product->id ])}}">{{$item->product->name}}</a>
                    </p>
                </li>
            @endforeach
            </ul>
        </td>
        <td>{{$order->total}}</td>
        <td>
               {{ $order->statusOrder->name }}
                   
        </td>
        <td><a href="{{route('orders.edit',['id'=>$order->id])}}" class="btn btn-sm btn-warning">Change Status</a></td>
    </tr>
    @endforeach
</table>
@stop
