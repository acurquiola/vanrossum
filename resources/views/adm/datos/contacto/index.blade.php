@include('adm.datos.contacto.partials.header')
					<a class="breadcrumb">Editar</a>
				</div>

				<h5>Información de Contacto</h5>					
				<div class="divider"></div>
				<table class="index-table responsive-table ">
					<tbody>
						@if($direccion)
							<tr>
								<td><b>Dirección</b></td>
								<td>{{ $direccion->descripcion }}</td>
								<td >
									<a href=" {{ action('DatoController@editContacto', $direccion->id)}} " class="btn-floating btn-large waves-effect waves-light orange right"><i class="fas fa-pencil-alt"></i></a>
								</td>
							</tr>
						@endif
						@if($email)
							<tr>
								<td><b>Correo Electrónico</b></td>
								<td>{{ $email->descripcion }}</td>
								<td >
									<a href=" {{ action('DatoController@editContacto', $email->id)}} " class="btn-floating btn-large waves-effect waves-light orange right"><i class="fas fa-pencil-alt"></i></a>
								</td>
							</tr>
						@endif
						@if($telefono)
							<tr>
								<td><b>N° de Teléfono</b></td>
								<td>{{ $telefono->descripcion }}</td>
								<td >
									<a href=" {{ action('DatoController@editContacto', $telefono->id)}} " class="btn-floating btn-large waves-effect waves-light orange right"><i class="fas fa-pencil-alt"></i></a>
								</td>
							</tr>
						@endif
						@if($mapa)
							<tr>
								<td><b>Link Mapa</b></td>
								<td>{{ substr($mapa->descripcion, 0, 70) }}...</td>
								<td >
									<a href=" {{ action('DatoController@editContacto', $mapa->id)}} " class="btn-floating btn-large waves-effect waves-light orange right"><i class="fas fa-pencil-alt"></i></a>
								</td>
							</tr>
						@endif
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