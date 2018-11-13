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
                          'layouts.navbar'], function ($view) {
            $logos = \App\Logo::where('ubicacion', 'navbar')->first();
            $view->with(compact('logos'));
        });

        view()->composer(['layouts.footer'], function ($view) {
            /*$informacion = \App\Dato::first();
            $caracteres  = array("(", ")", "-", " ", "+");
            $numeroWs    = str_replace($caracteres, "", $informacion->whatsapp);*/
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
