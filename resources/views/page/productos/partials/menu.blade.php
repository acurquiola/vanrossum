
	<div class="col s12 m12 l3">			
		<ul class="collapsible z-depth-0" id="productos-collapsible" data-collapsible="accordion">
				<li class="collapsible-header valign-wrapper" id="productos-collapsible-header" style="border-top: 2px solid #F8A900 !important">
					CATEGORIAS
				</li>
			@foreach($familias as $f)
				<li>
					<div class="collapsible-header valign-wrapper {{ ($familia_padre->id == $f->id)?'familia-active':'' }} " 
						 style="display: flex;
						 		justify-content: space-between; 
						 		align-items: center;" 
						 id="productos-collapsible-header">
						<a href="{{action('SeccionProductoController@listar', ['id' => $f->id, 'padre' => $f->id])}}" 
						   style="color: #454545">{{$f->nombre}}
						</a>  
						@if($familia_padre->id == $f->id) 
							<i class="material-icons right valign-wrapper icon-active">keyboard_arrow_down</i> 
						@else  
							<i class="material-icons right valign-wrapper">keyboard_arrow_right</i>   
						@endif
					</div>
					@forelse($f->subfamilias as $s)
						<div class="collapsible-body valign-wrapper {{ ($familia_padre->id == $s->id)?'familia-active':'' }}" 
							 id="productos-collapsible-body" 
							 @if($familia_padre->id == $s->familia_id) 
							 	style="display:block;" 
							 @endif>
							<a href="{{action('SeccionProductoController@listar', ['id' => $s->id, 'padre' => $s->familia_id])}}">{{ mb_strtoupper($s->nombre) }}</a>
						</div>
					@empty
					@endforelse
				</li>
			@endforeach
		</ul>
	</div>


