@include('adm.home.destacados.partials.header')

				</div>

				<h5>Novedades Destacadas</h5>					
				<div class="divider"></div>
				<table class="index-table-logos responsive-table ">
					<thead>
						<tr>
							<th>Imagen</th>
							<th>Título</th>
							<th>Texto</th>
							<th>Categoría</th>
							<th>Orden</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						@forelse($novedades as $n)
							<tr>
								<td style="width: 200px;"><img src="{{ asset('images/novedades/'.$n->novedad->file_image) }}"></td>
								<td style="width: 100px;">{{ $n->novedad->titulo }}</td>
								<td style="width: 250px;">{!! substr($n->novedad->texto, 0, 150) !!} ...</td>
								<td>{{ $n->novedad->categoria->nombre }}</td>
								<td>{{ $n->orden }}</td>
								<td>
									<a href=" {{ action('DestacadoController@edit', $n->id)}} " class="btn-floating btn-large waves-effect waves-light orange"><i class="material-icons">autorenew</i></a>								</td>
							</tr>
						@empty
							<tr>
								<td colspan="5">No existen registros</td>
							</tr>
						@endforelse
					</tbody>
				</table>

			</div>
		</div>
	</div>



</main>



@include('layouts.script')



<script>



	$(document).ready(function(){		
		M.AutoInit();
		$('.collapsible').collapsible();
		$('select').formSelect();  

	});
</script>


</body>

</html>