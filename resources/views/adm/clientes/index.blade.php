	@include('adm.usuarios.partials.header')

				</div>

				<h5>Clientes</h5>					
				<div class="divider"></div>
				<table class="index-table responsive-table ">
					<thead>
						<tr>
							<th>Username</th>
							<th>Nombre</th>
							<th>Opciones</th>

						</tr>
					</thead>
					<tbody>
						@forelse($usuarios as $u)
							<tr>
								<td>{{ $u->username }}</td>
								<td>{{ $u->name }}</td>
								<td>
									<a href=" {{ action('UserController@edit', $u->id)}} " class="btn-floating btn-large waves-effect waves-light orange"><i class="fas fa-pencil-alt"></i></a>
									<a onclick="return confirm('¿Realmente desea eliminar este registro?')"  href=" {{ action('UserController@eliminar', $u->id)}} " class="btn-floating btn-large waves-effect waves-light blue"><i class="fas fa-user-minus"></i></a>
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