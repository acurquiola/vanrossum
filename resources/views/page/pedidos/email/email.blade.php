
Has recibido un pedido de : {{ $usuario->name }}

<p>
Pedido nro: {{ $compra->id }}
</p>

Medio de Pago: {{  $compra->medio_pago }}

<table class="center">
<thead>
  <tr>
      <th>Descripción</th>
      <th>Cantidad</th>
      <th>Monto</th>
  </tr>
</thead>

<tbody>
	@foreach($compra->presentaciones as $a)
  	  <tr>
	    <td>{{ $a->producto->nombre }}</td>
	    <td>{{ $a->pivot->cantidad }}</td>
	    <td>{{ $a->precio}}</td>
	  </tr>
	@endforeach
</tbody>
<tfoot>
	<tr>
		<td colspan="2">Total</td>
		<td>{{ $compra->monto }}</td>
	</tr>
</tfoot>
</table>
