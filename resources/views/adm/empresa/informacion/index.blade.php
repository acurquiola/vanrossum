@include('adm.empresa.informacion.partials.header')

				</div>

				<h5>Información EMPRESA</h5>					
				<div class="divider"></div>
				<table class="index-table responsive-table ">
					<tbody>
						@if($empresa)
							<tr>
								<td><b>Misión</b></td>
								<td>{!! $empresa->mision !!}</td>
							</tr>
							<tr>
								<td><b>Visión</b></td>
								<td>{!! $empresa->vision !!}</td>
							</tr>
							<tr>
								<td><b>Valores</b></td>
								<td>{!! $empresa->valores !!}</td>
							</tr>
							<tr>
								<td><b>Imagen</b></td>
								<td><img src="{{ asset('images/empresa/'.$empresa->file_image) }}"></td>
							</tr>
							<tr>
								<td colspan="2">
									<a href=" {{ action('EmpresaController@edit', $empresa->id)}} " class="btn-floating btn-large waves-effect waves-light orange right"><i class="fas fa-pencil-alt"></i></a>
								</td>
							</tr>
						@else
							<tr>
								<td colspan="2">No existen registros</td>
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