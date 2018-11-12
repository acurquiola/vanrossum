@include('adm.productos.unidades.partials.header')

				</div>
				<div class="row">
					<div class="col s12">
						<div class="col s6">
							<h5>Unindades de Medición</h5>	
						</div>
						<div class="col s6">
							<div class="right">
								<a href="{{ action('UnidadController@create') }}" class="waves-effect waves-light btn"><i class="material-icons left">add</i>Agregar Unidad</a>
							</div>
						</div>
					</div>
				</div>
				<div class="divider"></div>
				<table class="index-table-logos responsive-table ">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Abreviación</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						@forelse($unidades as $u)
							<tr>
								<td>{{ $u->nombre }}</td>
								<td>{{ $u->abreviacion }}</td>
								<td>
									<a href=" {{ action('UnidadController@edit', $u->id)}} " class="btn-floating btn-large waves-effect waves-light orange"><i class="fas fa-pencil-alt"></i></a>
									<a onclick="return confirm('¿Realmente desea eliminar este registro?')"  href=" {{ action('UnidadController@eliminar', $u->id)}} " class="btn-floating btn-large waves-effect waves-light deep-orange"><i class="fas fa-trash-alt"></i></a>

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