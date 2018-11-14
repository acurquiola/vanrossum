<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Novedad;
use App\Metadato;
use App\Clasificacion;

class SeccionNovedadesController extends Controller
{
	public function index()
	{	
		$novedades        = Novedad::orderBy('clasificacion_id')->orderBy('orden')->get();
		$categorias       = Clasificacion::orderBy('orden')->get();

	    return view('page.novedades.index', compact('novedades', 'seccion', 'metadato', 'categorias'));
	}

	public function filter($id)
	{
		$novedades        = Novedad::where('clasificacion_id', $id)->orderBy('clasificacion_id')->orderBy('orden')->get();
		$seccion          = 'Novedades';
		$metadato         = Metadato::where('seccion', $seccion)->first();
		$categorias       = Clasificacion::orderBy('orden')->get();
		$categoria_activa = Clasificacion::find($id);

	    return view('page.novedades.filter', compact('novedades', 'seccion', 'metadato', 'categorias', 'categoria_activa'));
	}

	public function ver($id)
	{
		$novedad    = Novedad::find($id);
		$seccion    = 'Novedades';
		$metadato   = Metadato::where('seccion', $seccion)->first();
		$categorias = Clasificacion::orderBy('orden')->get();

	    return view('page.novedades.show', compact('novedad', 'seccion', 'metadato', 'categorias', 'categoria_activa'));

	}
}
