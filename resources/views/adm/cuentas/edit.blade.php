@include('adm.cuentas.partials.header')
					<a class="breadcrumb">Editar</a>
				</div>

				<h5>Cuentas</h5>					
				<div class="divider"></div>
				<div class="col s12">

					<form method="POST"  enctype="multipart/form-data" action="{{action('CuentaController@update', $cuenta->id)}}" class="col s12 m8 offset-m2 xl10 offset-xl1">
						{{ csrf_field() }}    
						{{ method_field('PUT')}}  

						<div class="row">
							<h5>Editar</h5>					
							<div class="divider"></div>

							<div class="input-field col s12">
								<i class="material-icons prefix">keyboard_arrow_right</i>
								<input id="icon_prefix" type="text" class="validate" name="descripcion"  value="{{$cuenta->descripcion}}" >
								<label for="icon_prefix">Descripción</label>
							</div>

							<div class="right">
								<a href="{{ action('CuentaController@index') }}" class="waves-effect waves-light btn btn-color">Cancelar</a>
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