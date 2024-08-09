<?php

namespace App\Http\Controllers\FormPizza;

use Illuminate\Http\Request;
use App\Models\FormPizza\Pizza;
use App\Models\FormPizza\Orden;
use App\Models\FormPizza\Ingrediente;
use App\Http\Controllers\Controller;

class OrdenesController extends Controller 
{

    public function index()
    {
       return view('ejemplo-blade.ejemplo1')->with(['texto' => 'Practica de vistas']);
    }

    public function show(Orden $orden)
    {
        $ingredientes = [];
        $pizzas = $orden->pizzas;
       
        foreach($pizzas as $pizzas){
            $ingredientes[$pizzas->id] = $pizzas->ingredientes->toArray();
        }



        return view('ejemplo-blade.ejemplo2')->with(['orden' => $orden, 'pizzas' => $pizzas, 'ingredientes' => $ingredientes]);
    }


    public function update(Request $req)
    {
        
    }

    public function destroy($id)
    {
       
    }
}