@include('adm.preguntas.partials.header')

				</div>
				<div class="row">
					<div class="col s12">
						<div class="col s6">
							<h5>Preguntas</h5>	
						</div>
					</div>
				</div>
				<div class="divider"></div>
				<table class="index-table-logos responsive-table ">
					<thead>
						<tr>
							<th>Pregunta</th>
							<th>Categoría</th>
							<th>Orden</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						@forelse($preguntas as $p)
							<tr>
								<td >{{ $p->pregunta }}</td>
								<td >{{ $p->categoria->nombre }}</td>
								<td>{{ $p->orden }}</td>
								<td>
									<a href=" {{ action('PreguntaController@edit', $p->id)}} " class="btn-floating btn-large waves-effect waves-light orange"><i class="fas fa-pencil-alt"></i></a>
									<a onclick="return confirm('¿Realmente desea eliminar este registro?')"  href=" {{ action('PreguntaController@eliminar', $p->id)}} " class="btn-floating btn-large waves-effect waves-light deep-orange"><i class="fas fa-trash-alt"></i></a>

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