@include('adm.preguntas.categorias.partials.header')
					<a class="breadcrumb">Crear</a>
				</div>
				<div class="col s12">
					<h5>Categorías</h5>	
				</div>
									
				<div class="divider"></div>
				<div class="col s12">

				<form method="POST"  enctype="multipart/form-data" action="{{action('CategoriaController@store')}}" class="col s12 m8 offset-m2 xl10 offset-xl1">



						{{ csrf_field() }}    

						<div class="row">
							<h5>Crear</h5>					
							<div class="divider"></div>
								<div class="input-field col s6">
									<i class="material-icons prefix">keyboard_arrow_right</i>
									<input id="icon_prefix" type="text" class="validate" name="nombre"  >
									<label for="icon_prefix">Nombre</label>
								</div>

								<div class="input-field col s6">
									<i class="material-icons prefix">keyboard_arrow_right</i>
									<input id="icon_prefix" type="text" class="validate" name="orden"   >
									<label for="icon_prefix">Orden</label>
								</div>


								<div class="right">
									<div class="col s6">
										<a href="{{ action('CategoriaController@index') }}" class="waves-effect waves-light btn btn-color">Cancelar</a>
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

<script>

	$(document).ready(function(){		
		M.AutoInit();
		$('.collapsible').collapsible();
		$('select').formSelect();  
	});
</script>


</body>

</html>