@include('adm.productos.familias.partials.header')

				</div>
				<div class="row">
					<div class="col s12">
						@if($nivel <= '1')
						<div class="col s12">
							<h5>Familias</h5>	
						</div>
						@else
						<div class="col s6">
							<h5>Subcategorías de {{ $familia_padre->nombre }}</h5>	
						</div>
						<div class="col s6">
							<div class="right">
								<a href="{{ action('SubfamiliaController@create', $familia_padre->id) }}" class="waves-effect waves-light btn"><i class="material-icons left">cloud</i>Agregar Subcategoría</a>
							</div>
						</div>
						@endif	
					</div>
				</div>
				<div class="divider"></div>
				<table class="index-table-logos responsive-table ">
					<thead>
						<tr>
							<th>Imagen</th>
							<th>Nombre</th>
							<th>Orden</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						@forelse($familias as $f)
							<tr>
								<td style="width: 350px;"><img src="{{ asset('images/familias/'.$f->file_image) }}"></td>
								<td >{{ $f->nombre }}</td>
								<td>{{ $f->orden }}</td>
								<td>
									<a href=" {{ action('SubfamiliaController@index', $f->id)}} " class="btn-floating btn-large waves-effect waves-light green"><i class="fas fa-folder-plus"></i></a>
									<a href=" {{ action('FamiliaController@edit', $f->id)}} " class="btn-floating btn-large waves-effect waves-light orange"><i class="fas fa-pencil-alt"></i></a>
									<a onclick="return confirm('¿Realmente desea eliminar este registro?')"  href=" {{ action('FamiliaController@eliminar', $f->id)}} " class="btn-floating btn-large waves-effect waves-light deep-orange"><i class="fas fa-trash-alt"></i></a>

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