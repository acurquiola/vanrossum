<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DataServicesProviders extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    	view()->composer(['adm.layouts.sidebar', 
			    		  'adm.auth.login',
			    		  'adm.layouts.navbar',
			    		  'layouts.navbar'
			    		], function ($view) {
    			$logos = \App\Logo::where('ubicacion', 'navbar')->first();
    			$view->with(compact('logos'));
    		});

    	view()->composer(['layouts.footer',
    					  'page.contacto.partials.form'
    					], function ($view) {
            $direccion = \App\Dato::where('tipo', 'direccion')->first();
            $email     = \App\Dato::where('tipo', 'email')->first();
            $telefono  = \App\Dato::where('tipo', 'telefono')->first();
            $mapa      = \App\Dato::where('tipo', 'mapa')->first();
            $facebook  = \App\Dato::where('tipo', 'facebook')->first();
            $instagram = \App\Dato::where('tipo', 'instagram')->first();

            $view->with(compact('direccion', 'email', 'telefono', 'mapa', 'facebook', 'instagram'));
        });

        view()->composer(['layouts.footer'], function ($view) {
            $logos    = \App\Logo::where('ubicacion', 'footer')->first();
            $view->with(compact('logos'));
        });

        view()->composer(['page.productos.partials.menu'], function ($view) {
            $familias    = \App\Familia::where('nivel', '1')->orderBy('orden')->get();
            $subfamilias = \App\Familia::with('subfamilias')->where('nivel', '>', '2')->orderBy('orden')->get();
            $productos   = \App\Producto::orderBy('orden')->get();

            $view->with(compact('familias', 'subfamilias', 'productos', 'nivel', 'first_nivel'));
        });

    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
