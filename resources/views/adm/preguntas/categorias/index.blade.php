@include('adm.preguntas.categorias.partials.header')

				</div>
				<div class="row">
					<div class="col s12">
						<div class="col s6">
							<h5>Categorías</h5>	
						</div>
					</div>
				</div>
				<div class="divider"></div>
				<table class="index-table-logos responsive-table ">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Orden</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						@forelse($categorias as $c)
							<tr>
								<td >{{ $c->nombre }}</td>
								<td>{{ $c->orden }}</td>
								<td>
									<a href=" {{ action('CategoriaController@edit', $c->id)}} " class="btn-floating btn-large waves-effect waves-light orange"><i class="fas fa-pencil-alt"></i></a>
									<a onclick="return confirm('¿Realmente desea eliminar este registro?')"  href=" {{ action('CategoriaController@eliminar', $c->id)}} " class="btn-floating btn-large waves-effect waves-light deep-orange"><i class="fas fa-trash-alt"></i></a>

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