@include('adm.home.informacion.partials.header')


					<a class="breadcrumb">Editar</a>
				</div>

				<h5>Información</h5>					
				<div class="divider"></div>
				<div class="col s12">

					<form method="POST"  enctype="multipart/form-data" action="{{action('HomeController@updateTexto', $texto->id)}}" class="col s12 m8 offset-m2 xl10 offset-xl1">
						{{ csrf_field() }}    
						{{ method_field('PUT')}}  

						<div class="row">
							
							<div class="row">
								<div class="input-field col s6">
									<i class="material-icons prefix">keyboard_arrow_right</i>
									<input id="icon_prefix" type="text" class="validate" name="home_titulo"  value="{{$texto->home_titulo}}" >
									<label for="icon_prefix">Título</label>
								</div>
								<div class="input-field col s6">
									<i class="material-icons prefix">keyboard_arrow_right</i>
									<input id="icon_prefix" type="text" class="validate" name="home_subtitulo"  value="{{$texto->home_subtitulo}}" >
									<label for="icon_prefix">Subtítulo</label>
								</div>
							</div>

							<div class="right">
								<a href="{{ action('HomeController@index') }}" class="waves-effect waves-light btn btn-color">Cancelar</a>
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

	$(document).ready(function(){		
		M.AutoInit();
		$('.collapsible').collapsible();
		$('select').formSelect();  
	});
</script>


</body>

</html>