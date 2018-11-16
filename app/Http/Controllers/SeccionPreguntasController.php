<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pregunta;
use App\Categoria;

class SeccionPreguntasController extends Controller
{
    public function index(){
		$preguntas  = Pregunta::orderBy('orden')->get();
		$categorias = Categoria::with('preguntas')->orderBy('orden')->get();
		
    	return view('page.preguntas.index', compact('preguntas', 'categorias'));
    }
}
