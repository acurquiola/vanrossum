@include('adm.general.codPostal.partials.header')
					<a class="breadcrumb">Editar</a>
				</div>
				<form method="POST"  enctype="multipart/form-data" action="{{action('CodPostalController@update', $archivo->id)}}" class="col s12 m8 offset-m2 xl10 offset-xl1">
					{{ csrf_field() }}    
					{{ method_field('PUT')}}  

					<div class="row">
						<h5>Editar archivo</h5>					
						<div class="divider"></div>

						<div class="file-field input-field s12">
							<div class="btn">
								<span>Archivo</span>
								<input type="file" name="file">            

							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate" type="text">
								<span class="helper-text" data-error="wrong" data-success="right">Formato aceptado: .xlxs</span>
							</div>
						</div>

						<div class="input-field col s6">
							<i class="material-icons prefix">keyboard_arrow_right</i>
							<input id="icon_prefix" type="text" class="validate" name="nombre" readonly value="Códigos Postales" >
							<label for="icon_prefix">Nombre</label>
						</div>
					</div>

					<div class="right">
						<a href="{{ action('CodPostalController@edit') }}" class="waves-effect waves-light btn btn-color">Cancelar</a>
						<button class="btn waves-effect waves-light btn-color" type="submit" name="action">Submit
							<i class="material-icons right">send</i>
						</button>
					</div>
				</div>
			</form>
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