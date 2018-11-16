<footer class="page-footer" id="footer" style="position: relative;">
		<div class="row" style="margin:0;">
			<div class="col s12 m12 l3" style="padding: 5% 10%" >
				<a href="{{ url('/') }}" class="brand-logo">
					<img id="logo-footer" class="img-responsive" src="{{ asset("images/logos/".$logos->file_image) }}" alt="">
				</a>
			</div>
			<div class="col s12 m12 l9" style="padding-top: 3%">
				<div class="col s12 m12 l5 footer-text">
					<div class="row">
						<span id="nombre-footer">SECCIONES</span>
					</div>
					<div class="row">
						<div class="col s12 m6">
							<a href=" {{ url('/')}} " >Inicio</a>
						</div>
						<div class="col s12 m6">
							<a href=" {{ url('/novedades')}} " >Novedades</a>
						</div>
					</div>
					<div class="row">
						<div class="col s12 m6">
						<a href=" {{ url('/productos')}} " >Productos</a>
						</div>
						<div class="col s12 m6">
							<a href=" {{ url('/novedades')}} " >Quiénes Somos</a>
						</div>
					</div>
					<div class="row">
						<div class="col s12 m6">
						<a href=" {{ url('/productos')}} " >Carrito</a>
						</div>
						<div class="col s12 m6">
							<a href=" {{ url('/novedades')}} " >Contacto</a>
						</div>
					</div>
					<div class="row">
						<div class="col s12 m6">
						<a href=" {{ url('/productos')}} " >Novedades</a>
						</div>
						<div class="col s12 m6">
							<a href=" {{ url('/preguntas')}} " >Cómo Comprar</a>
						</div>
					</div>
				</div>
				
				<div class="col s12 m12 l2 footer-title center">
					<span id="nombre-footer">SEGUINOS</span>
					<div class="row footer-icon-rrss" >
						<a target="_blank" href="{{ $facebook->descripcion }}" ><i class="fab fa-facebook"></i></a>
						<a target="_blank" href="{{ $instagram->descripcion }}"><i class="fab fa-instagram"></i></a>
					</div>
				</div>
				<div class="col s12 m12 l4 offset-l1 ooter-title">
					<span id="nombre-footer">VAN ROSSUM DISTRIBUIDORA</span>
					<ul style="margin-top: 2%; ">
						<li class="footer-text">
							<div class="row">
								<div class="col s1 footer-icon">
									<i class="fas fa-map-marker-alt"></i>
								</div>
								<div class="col s10">
									<a target="_blank" href="https://goo.gl/maps/Fg7NECFuJgu">{{ $direccion->descripcion }}</a>
								</div>
							</div>
						</li>
						<li class="footer-text" >
							<div class="row">
								<div class="col s1 footer-icon">
									<i class="fas fa-phone"></i>
								</div>
								<div class="col s10">
									<a href="tel:{{ $telefono->descripcion }}">{{ $telefono->descripcion }}</a>
								</div>
							</div>
						</li>
						<li class="footer-text" style="margin-bottom: 10px">
							<div class="row">
								<div class="col s1 footer-icon">
									<i class="fas fa-envelope"></i>
								</div>
								<div class="col s10">
									<a href="mailto:{{ $email->descripcion }}">{{ $email->descripcion }}</a> 
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div> 
		</div>
		<div class="divider" style="width: 90%; margin-left: 6%; background: #A4A4A4; height: 2px;"></div>
		<div class="row" style="margin:0;">
			<div class="col s12" id="osole-span" >
				<span class="right ">BY OSOLE</span>
			</div>
		</div>
</footer>
