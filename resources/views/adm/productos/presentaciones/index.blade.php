@include('adm.productos.presentaciones.partials.header')

				</div>
				<div class="row">
					<div class="col s12">
						<div class="col s6">
							<h5>Presentaciones</h5>	
						</div>
						<div class="col s6">
							<div class="right">
								<a href="{{ action('PresentacionController@create', $producto->id) }}" class="waves-effect waves-light btn"><i class="material-icons left">add</i>Agregar Presentación</a>
							</div>
						</div>
					</div>
				</div>
				<div class="divider"></div>
				<table class="index-table-logos responsive-table ">
					<thead>
						<tr>
							<th>Cantidad</th>
							<th>Precio (USD)</th>
							<th>Unidad</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						@forelse($presentaciones as $p)
							<tr>
								<td>{{ $p->cantidad }}</td>
								<td>{{ $p->precio }}</td>
								<td>{{ $p->unidad->nombre}} ({{$p->unidad->abreviacion}}) </td>
								<td>
									<a href=" {{ action('PresentacionController@edit', $p->id)}} " class="btn-floating btn-large waves-effect waves-light orange"><i class="fas fa-pencil-alt"></i></a>
									<a onclick="return confirm('¿Realmente desea eliminar este registro?')"  href=" {{ action('PresentacionController@eliminar', $p->id)}} " class="btn-floating btn-large waves-effect waves-light deep-orange"><i class="fas fa-trash-alt"></i></a>

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