@include('adm.home.informacion.partials.header')

				</div>

				<h5>Información en HOME</h5>					
				<div class="divider"></div>
				<table class="index-table responsive-table ">
					<thead>
						<tr>
							<th>Imagen</th>
							<th>Nombre</th>
							<th>Orden</th>
							<th>Opciones</th>

						</tr>
					</thead>
					<tbody>
						@if($informacions->count()>0)
							@foreach($informacions as $i)
							<tr>
								<td><img src="{{ asset('images/home/'.$i->file_image) }}"></td>
								<td>{{ $i->nombre }}</td>
								<td>{{ $i->orden }}</td>
								<td><a href=" {{ action('HomeController@edit', $i->id)}} " class="btn-floating btn-large waves-effect waves-light orange"><i class="fas fa-pencil-alt"></i></a>
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