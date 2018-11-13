<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Extensions\Helpers;
use Redirect;

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

        return view($vista);
    }

    public function store(Request $request, $seccion)
    {

        if($seccion=='home')
            $vista = 'adm.home.sliders.index';
        elseif($seccion=='empresa')
            $vista = 'adm.empresa.sliders.index';


        $slider    = new Slider;
        $datos     = $request->all();

        $file_save = Helpers::saveImage($request->file('file_image'), 'sliders');
        $file_save ? $datos['file_image'] = $file_save : false;       
        
        $slider->fill($datos);
        $slider->seccion = $seccion;

        if($slider->save())
            return redirect()->back()->with('alert', "Registro almacenado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar almacenado el registro" );
    }


    public function edit($seccion, $id)
    {
    	if($seccion=='home')
    	 	$vista = 'adm.home.sliders.edit';
    	elseif($seccion=='empresa')
    	 	$vista = 'adm.empresa.sliders.edit';

        $slider = Slider::find($id);

        return view($vista, compact('slider'));
    }

    public function update(Request $request, $seccion, $id)
    {

        if($seccion=='home')
            $vista = 'adm.home.sliders.index';
        elseif($seccion=='empresa')
            $vista = 'adm.empresa.sliders.index';



        $slider    = Slider::find($id);
        $datos     = $request->all();
        $file_save = Helpers::saveImage($request->file('file_image'), 'sliders');
        $file_save ? $datos['file_image'] = $file_save : false;       
        
        $slider->fill($datos);

        if($slider->save())
            return redirect()->back()->with('alert', "Registro actualizado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar actualizar el registro" );
    }

    public function eliminar($id){
        $slider = Slider::find($id);

        if($slider->delete())
            return redirect()->back()->with('alert', "Registro eliminado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar eliminar el registro" );
    }
}
