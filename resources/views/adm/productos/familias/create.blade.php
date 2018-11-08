@include('adm.productos.familias.partials.header')
					<a class="breadcrumb">Crear</a>
				</div>

				@if($nivel <= '1')
				<div class="col s12">
					<h5>Familias</h5>	
				</div>
									
				<div class="divider"></div>
				<div class="col s12">

				<form method="POST"  enctype="multipart/form-data" action="{{action('FamiliaController@store')}}" class="col s12 m8 offset-m2 xl10 offset-xl1">

				@else
				<div class="col s6">
					<h5>Subfamilia de {{ $familia_padre->nombre }}</h5>	
				</div>
									
				<div class="divider"></div>
				<div class="col s12">

				<form method="POST"  enctype="multipart/form-data" action="{{action('SubfamiliaController@store', $familia_padre->id)}}" class="col s12 m8 offset-m2 xl10 offset-xl1">

				@endif	


						{{ csrf_field() }}    

						<div class="row">
							<h5>Crear</h5>					
							<div class="divider"></div>


							<div class="file-field input-field s12">
								<div class="btn">
									<span>Imagen</span>
									<input type="file" name="file_image">            

								</div>
								<div class="file-path-wrapper">
									<input class="file-path validate" type="text">
									<span class="helper-text" data-error="wrong" data-success="right">Tamaño recomendado: 266x279</span>
								</div>
							</div>

							<div class="input-field col s6">
								<i class="material-icons prefix">keyboard_arrow_right</i>
								<input id="icon_prefix" type="text" class="validate" name="nombre" >
								<label for="icon_prefix">Nombre</label>
							</div>

							<div class="input-field col s6">
								<i class="material-icons prefix">keyboard_arrow_right</i>
								<input id="icon_prefix" type="text" class="validate" name="orden" >
								<label for="icon_prefix">Orden</label>
							</div>

							<input type="hidden" name="familia_id" value="{{ ($nivel <= '1')?'1':$familia_padre->id }}">
							

							<div class="right">
								@if($nivel <= '1')
									<a href="{{ action('FamiliaController@index') }}" class="waves-effect waves-light btn btn-color">Cancelar</a>
								@else
								<div class="col s6">
									<a href="{{ action('SubfamiliaController@index', $familia_padre->id) }}" class="waves-effect waves-light btn btn-color">Cancelar</a>
								</div>
								@endif	
								<button class="btn waves-effect waves-light btn-color" type="submit" name="action">Submit
									<i class="material-icons right">send</i>
								</button>
							</div>
						</div>
					</form>

				</div>
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