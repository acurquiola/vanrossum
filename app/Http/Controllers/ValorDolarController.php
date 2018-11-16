<?php

namespace App\Http\Controllers;
use App\Extensions\Helpers;
use Goutte\Client;



use Illuminate\Http\Request;

class ValorDolarController extends Controller
{
    public function index(Client $client)
    {

        $cliente = New Client;
        
        $valor   = Helpers::dolar($cliente);
        return view('page.dolar', compact('valor'));
    }
}
