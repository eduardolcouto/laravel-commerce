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
            <?php
                switch ($order->status) {
                    case 0:
                        echo 'Aguardando Pagamento';
                        break;

                    case 1:
                        echo 'Em Separação No estoque';
                        break;

                    case 2:
                        echo 'Em transporte';
                        break;

                    case 3:
                        echo 'Entregue';
                        break;

                    case 3:
                        echo 'Cancelado';
                        break;

                    default:
                        # code...
                        break;
                }
            ?>
        </td>
    </tr>
    @endforeach
</table>
@stop
