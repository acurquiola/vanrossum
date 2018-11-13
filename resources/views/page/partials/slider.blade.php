
<div class="slider" id="slider-home">
	<ul class="slides">
		@forelse($sliders as $s)
		<li>
			<img src="{{ asset('images/sliders/'.$s->file_image) }}" class="img-responsive"> 
			<div class="caption center-align  hide-on-med-and-down" id="slider-caption">  
				<div id="titulo-caption">
					<p  id="titulo-caption">{!! $s->titulo !!}</p>
				</div>
				<div id="descripcion-caption">
					<p id="descripcion-caption">{!! $s->descripcion !!}</p>				
				</div>
			</div>
		</li>
		@empty
		@endforelse
	</ul>
</div>


 