@extends('store.store')

@section('content')
<section id="cart_items">
	<div class="container">
		<div class="table-reponsive cart_info">
			<table class="table table-condensed">
				<thead >
					<tr class="cart_menu">
						<th class="image">Item</th>
						<th class="description"></th>
						<th class="price">Price</th>
						<th class="qtd">Qtd</th>
						<th class="total">Total</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				@forelse($cart->all() as $k => $item)
					<tr>
						<td class="cart_product">
							<a href="#">
								imagem
							</a>
						</td>
						<td class="cart_description">
							<h4>
							<a href="{{route('show.product',['id'=>$k])}}">{{$item['name']}}</a>
							<p>Codigo: {{$k}}</p>
							</h4>
						</td>
						<td class="cart_price">
							R$ {{$item['price']}}
						</td>
						<td class="cart_quantity">
							{{$item['qtd']}}
						</td>
						<td class="cart_total">
							<p class="cart_total_price">
								R$ {{$item['price'] * $item['qtd']}}
							</p>
						</td>
						<td class="cart_delete">
							<a href="{{route('cart.destroy',['id' => $k ])}}" class="cart_quantity_delete">
								Delete
							</a>
						</td>
					</tr>
				@empty
					<tr>
						<td colspan="6">
							Nenhum item encontrado
						</td>
					</tr>
				@endforelse
				</tbody>
				<tfoot>
					<tr class="cart_menu">
						<td colspan="6">
							<div class="pull-right">
								<spam>R$ {{$cart->getTotal()}}</spam>
								<a href="" class="btn btn-success">Fechar a conta</a>
							</div>
						</td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</section>
@stop