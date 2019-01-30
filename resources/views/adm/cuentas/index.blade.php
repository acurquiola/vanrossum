@include('adm.cuentas.partials.header')

				</div>

				<h5>Cuentas</h5>					
				<div class="divider"></div>
				<table class="index-table responsive-table ">
					<thead>
						<tr>
							<th>Descripción</th>
							<th>Opciones</th>

						</tr>
					</thead>
					<tbody>
						@if($cuentas->count()>0)
							@foreach($cuentas as $c)
							<tr>
								<td>{{ $c->descripcion }}</td>
								<td><a href=" {{ action('CuentaController@edit', $c->id)}} " class="btn-floating btn-large waves-effect waves-light orange"><i class="fas fa-pencil-alt"></i></a>
								</td>
							</tr>
							@endforeach
						@else
						<tr>
							<td colspan="4">No existen registros</td>
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