@include('adm.productos.unidades.partials.header')
<a class="breadcrumb">Crear</a>
</div>

<div class="col s12">
	<h5>Unidades</h5>	
</div>

<div class="divider"></div>
	<div class="col s12">

		<form method="POST"  enctype="multipart/form-data" action="{{action('UnidadController@store')}}" class="col s12 m8 offset-m2 xl10 offset-xl1">
			{{ csrf_field() }}    

			<div class="row">
				<h5>Crear</h5>					
				<div class="divider"></div>

				<div class="input-field col s6">
					<i class="material-icons prefix">keyboard_arrow_right</i>
					<input id="icon_prefix" type="text" class="validate" name="nombre" >
					<label for="icon_prefix">Nombre</label>
				</div>

				<div class="input-field col s6">
					<i class="material-icons prefix">keyboard_arrow_right</i>
					<input id="icon_prefix" type="text" class="validate" name="abreviacion" >
					<label for="icon_prefix">Abreviación</label>
				</div>

				<div class="row">
					
					<div class="right">
						<a href="{{ action('UnidadController@index') }}" class="waves-effect waves-light btn btn-color">Cancelar</a>
						<button class="btn waves-effect waves-light btn-color" type="submit" name="action">Submit
							<i class="material-icons right">send</i>
						</button>
					</div>
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