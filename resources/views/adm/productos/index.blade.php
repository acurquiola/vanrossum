@include('adm.productos.partials.header')

				</div>

				<h5>Productos</h5>					
				<div class="divider"></div>
				<table class="index-table-logos responsive-table ">
					<thead>
						<tr>
							<th>Imagen</th>
							<th>Nombre</th>
							<th>Familia</th>
							<th>Orden</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						@forelse($productos as $p)
							<tr>
								<td style="width: 150px;"><img src="{{ asset('images/productos/'.$p->file_image) }}"></td>
								<td >{{ $p->nombre }}</td>
								<td>{{ $p->familia->nombre }}</td>
								<td>{{ $p->orden }}</td>
								<td>
									<a href=" {{ action('DescuentoController@index', $p->id)}}" class="btn-floating btn waves-effect waves-light blue"><i style="font-size: 15px" class="fas fa-percent"></i></a>
									<a href=" {{ action('ProductoController@edit', $p->id)}}" class="btn-floating btn waves-effect waves-light orange"><i style="font-size: 15px" class="fas fa-pencil-alt"></i></a>
									<a href=" {{ action('PresentacionController@index', $p->id)}}" class="btn-floating btn waves-effect waves-light green"><i style="font-size: 15px" class="fas fa-flask"></i></a>
									<a onclick="return confirm('¿Realmente desea eliminar este registro?')"  href=" {{ action('ProductoController@eliminar', $p->id)}} " class="btn-floating btn waves-effect waves-light deep-orange"><i style="font-size: 15px" class="fas fa-trash-alt"></i></a>
								</td>
							</tr>
						@empty
							<tr>
								<td colspan="4">No existen registros</td>
							</tr>
						@endforelse
					</tbody>
				</table>

			</div>
		</div>
	</div>



</main>



@include('adm.layouts.script')



<script>



	$(document).ready(function(){		
		M.AutoInit();
		$('.collapsible').collapsible();
		$('select').formSelect();  

	});
</script>


</body>

</html>