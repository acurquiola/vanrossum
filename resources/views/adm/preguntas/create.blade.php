@include('adm.preguntas.partials.header')
<a class="breadcrumb">Crear</a>
</div>
<div class="col s12">
	<h5>Preguntas</h5>	
</div>

<div class="divider"></div>
<div class="col s12">

	<form method="POST"  enctype="multipart/form-data" action="{{action('PreguntaController@store')}}" class="col s12 m8 offset-m2 xl10 offset-xl1">



		{{ csrf_field() }}    

		<div class="row">
			<h5>Crear</h5>					
			<div class="divider"></div>
			<div class="input-field col s10">
				<i class="material-icons prefix">keyboard_arrow_right</i>
				<input id="icon_prefix" type="text" class="validate" name="pregunta"  >
				<label for="icon_prefix">Pregunta</label>
			</div>


			<div class="input-field col s2">
				<i class="material-icons prefix">keyboard_arrow_right</i>
				<input id="icon_prefix" type="text" class="validate" name="orden"   >
				<label for="icon_prefix">Orden</label>
			</div>

			<div class="col s12">
				<h6 for="textarea1">Respuesta</h6>
			</div>
			<div class="input-field col s12">

				<textarea id="respuesta" name="respuesta"> </textarea>
			</div>


			<div class="input-field col s5">
				<select class="materialSelect" id="familia" name="categoria_id">
					@foreach ($categorias as $c )
					<option value="{{ $c->id }}" >{{ ucwords($c->nombre) }} </option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="row">
			
			<div class="right">
				<div class="col s6">
					<a href="{{ action('PreguntaController@index') }}" class="waves-effect waves-light btn btn-color">Cancelar</a>
				</div>
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
<script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>



<script>

	CKEDITOR.replace('respuesta');
	CKEDITOR.config.height = '150px';
	CKEDITOR.config.width = '100%';

	$(document).ready(function(){		
		M.AutoInit();
		$('.collapsible').collapsible();
		$('select').formSelect();  
	});
</script>


</body>

</html>