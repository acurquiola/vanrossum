@include('adm.productos.presentaciones.partials.header')
<a class="breadcrumb">Editar</a>
</div>

<h5>Presentación</h5>					
<div class="divider"></div>
<div class="col s12">

	<form method="POST"  enctype="multipart/form-data" action="{{action('PresentacionController@update', $presentacion->id)}}" class="col s12 m8 offset-m2 xl10 offset-xl1">
		{{ csrf_field() }}    
		{{ method_field('PUT')}}  

		<div class="row">
			<h5>Editar</h5>					
			<div class="divider"></div>

			<div class="input-field col s4">
				<i class="material-icons prefix">keyboard_arrow_right</i>
				<input id="icon_prefix" type="text" class="validate" name="cantidad" value="{{ $presentacion->cantidad }}">
				<label for="icon_prefix">Cantidad</label>
			</div>
			<div class="input-field col s4">
				<select class="materialSelect" id="unidad" name="unidad_id">
					@foreach ($unidades as $u )
					<option value="{{ $u->id }}" @if($u->id == $presentacion->unidad_id) selected @endif  >{{ ucwords($u->abreviacion) }} </option>
					@endforeach
				</select>
			</div>

			<div class="input-field col s4">
				<i class="material-icons prefix">keyboard_arrow_right</i>
				<input id="icon_prefix" type="text" class="validate" name="precio" value="{{ $presentacion->precio }}">
				<label for="icon_prefix">Precio (USD)</label>
			</div>



			<div class="right">
				<a href="{{ action('PresentacionController@index', $producto->id) }}" class="waves-effect waves-light btn btn-color">Cancelar</a>
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