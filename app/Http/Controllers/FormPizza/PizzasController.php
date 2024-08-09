<?php

namespace App\Http\Controllers\FormPizza;

use App\Jobs\UpdatePago;
use Illuminate\Http\Request;
use App\Models\FormPizza\Orden;
use App\Models\FormPizza\Pizza;
use App\Models\FormPizza\Ingrediente;
use App\Http\Controllers\Controller;
use App\Events\UpdateIngredientes;
use Illuminate\Support\Facades\Artisan;

class PizzasController extends Controller 
{

    public function index()
    {
        $pizzas = Pizza::with('ingredientes')->get();
        return response()->json( $pizzas);
    }

    public function show()
    {
    }

    public function store(Request $req)
    {

       $orden = new Orden();
       $orden->numero_orden = mt_rand(100000, 999999);
       $orden->id_cliente = 1;

       if($req->has('orden')) {
            $orden = Orden::find($req->input('orden'));
       } 

       $orden->save();

       $nombre = $req->input('name');
       $size = $req->input('size');
       $ingredientes = $req->input('ingredientes');

       $model = new Pizza();
       $model->name = $nombre;
       $model->size = $size;
       $model->id_orden = $orden->id;

       $model->save();

       $model->ingredientes()->sync($ingredientes);

       event(new UpdateIngredientes($ingredientes));
       
       UpdatePago::dispatch($orden->id)->onQueue('high');

       Artisan::call('pizzas:ingredientes', ['--ingrediente' => 5 ]);

       return response()->json(["orden" => $orden->id, "pizza" => $model->toArray()]);

    }

    public function update(Request $req)
    {
        
    }

    public function destroy($id)
    {
        
    }

    
}