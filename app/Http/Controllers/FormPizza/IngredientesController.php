<?php

namespace App\Http\Controllers\FormPizza;

use Illuminate\Http\Request;
use App\Models\FormPizza\Ingrediente;
use App\Http\Controllers\Controller;

class IngredientesController extends Controller 
{

    public function index()
    {
        $ingredientes = Ingrediente::where('cantidad', '>', 0)->get();

        return response()->json($ingredientes);
    }

    public function show(Ingrediente $ingrediente)
    {
        return response()->json($ingrediente->toArray());
    }

    public function store(Request $req)
    {
        if( $req->has('nombre') ) {            
            $nombre = $req->input('nombre');

            $model = new Ingrediente();
            $model->name = $nombre;
            $model->save();

            return response()->json($model->toArray());

        }else{
            return response()->json(["error" => "Parametro nombre faltante"], 422);
        }
    }

    public function update(Request $req, Ingrediente $ingrediente)
    {
        if( $req->has('nombre') ) {            
            $nombre = $req->input('nombre');

            $ingrediente->name = $nombre;
            $ingrediente->save();

            return response()->json($ingrediente->toArray());

        }else{
            return response()->json(["error" => "Parametro nombre faltante"], 422);
        }
    }

    public function destroy($id)
    {
        $model = Ingrediente::where('id', $id);
        $model->delete();

        return response()->json(["message" => "Objeto eliminado"]);
    }
}