@include('adm.productos.partials.header')
					<a class="breadcrumb">Editar</a>
				</div>

				<h5>Productos</h5>					
				<div class="divider"></div>
				<div class="col s12">

					<form method="POST"  enctype="multipart/form-data" action="{{action('ProductoController@update', $producto->id)}}" class="col s12 m8 offset-m2 xl10 offset-xl1">
						{{ csrf_field() }}    
						{{ method_field('PUT')}}  

						<div class="row">
							<h5>Editar</h5>					
							<div class="divider"></div>


							<div class="file-field input-field s10">
								<div class="btn">
									<span>Imagen</span>
									<input type="file" name="file_image">            

								</div>
								<div class="file-path-wrapper">
									<input class="file-path validate" type="text">
									<span class="helper-text" data-error="wrong" data-success="right">Tamaño recomendado: 450x450
							</div>

							<div class="input-field col s6">
								<i class="material-icons prefix">keyboard_arrow_right</i>
								<input id="icon_prefix" type="text" class="validate" name="nombre"  value="{{$producto->nombre}}" >
								<label for="icon_prefix">Nombre</label>
							</div>


							<div class="input-field col s6">
								<i class="material-icons prefix">keyboard_arrow_right</i>
								<input id="icon_prefix" type="text" class="validate" name="codigo"  value="{{$producto->codigo}}" >
								<label for="icon_prefix">Código</label>
							</div>

							<div class="col s12">
								<h6 for="textarea1">Descripción</h6>
							</div>
							<div class="input-field col s12">

								<textarea id="descripcion" name="descripcion"> {!! $producto->descripcion !!} </textarea>
							</div>


							<div class="col s12">
								<h6 for="textarea1">Especificaciones</h6>
							</div>
							<div class="input-field col s12">

								<textarea id="especificaciones" name="especificaciones"> {!! $producto->especificaciones !!} </textarea>
							</div>


							<div class="input-field col s5">
								<select class="materialSelect" id="familia" name="familia_id">
									@foreach ($familias as $f )
									<option value="{{ $f->id }}" @if($f->id == $producto->familia_id) selected @endif >{{ ucwords($f->nombre) }} </option>
									@endforeach
								</select>
							</div>

							<div class="input-field col s5">
								<select class="materialSelect" id="subfamilia" name="subfamilia_id">
									@foreach ($subfamilias as $s )
									<option value="{{ $s->id }}" @if($s->id == $producto->subfamilia_id) selected @endif >{{ ucwords($s->nombre) }} </option>
									@endforeach
								</select>
							</div>

							<div class="input-field col s2">
								<i class="material-icons prefix">keyboard_arrow_right</i>
								<input id="icon_prefix" type="text" class="validate" name="orden"   value="{{$producto->orden}}" >
								<label for="icon_prefix">Orden</label>
							</div>

						</div>
						<div class="row">
							

							<div class="right">
								<a href="{{ action('ProductoController@index') }}" class="waves-effect waves-light btn btn-color">Cancelar</a>
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

<script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
<script>

	CKEDITOR.replace('descripcion');
	CKEDITOR.config.height = '150px';
	CKEDITOR.config.width = '100%';

	CKEDITOR.replace('especificaciones');
	CKEDITOR.config.height = '150px';
	CKEDITOR.config.width = '100%';


	$(document).ready(function(){		
		M.AutoInit();
		$('.collapsible').collapsible();
		$('select').formSelect();  
	});
	


	 $(document).on("change", '#familia', function () {
        var subfamiliasURL = "{{ url('adm/productos/select/subfamilias')}}";

        $.get(subfamiliasURL,
                {option: $(this).val()},
                function (data) {
                    var model = $('#subfamilia');
                    model.empty();
                    model.append("<option value='1'>Ninguna</option>");
                    $.each(data, function (index, element) {
                        model.append("<option value='" + element.id + "'>" + element.nombre + "</option>");

                    });
                    $('select').formSelect();  

                }
        );

    });
</script>


</body>

</html>