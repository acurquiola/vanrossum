<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

	public function index($seccion)
    {
    	if($seccion=='home')
    	 	$vista = 'adm.home.sliders.index';
    	elseif($seccion=='empresa')
    	 	$vista = 'adm.empresa.sliders.index';
    	

        $sliders = Slider::where('seccion', $seccion)->orderBy('orden', 'asc')->get();

        return view($vista, compact('sliders'));
    }

    public function create($seccion)
    {
    	if($seccion=='home')
    	 	$vista = 'adm.home.sliders.create';
    	elseif($seccion=='empresa')
    	 	$vista = 'adm.empresa.sliders.create';

        return view($vista, compact('sliders'));
    }

}
