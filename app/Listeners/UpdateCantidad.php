<?php

namespace App\Listeners;

use App\Models\FormPizza\Ingrediente;
use App\Events\UpdateIngredientes;

class UpdateCantidad {


    public function handle(UpdateIngredientes $event)
    {
        $ingredientes = $event->ingredientes_id;

        foreach($ingredientes as $ingrediente){

            $model = Ingrediente::find($ingrediente);
            $model->cantidad -= 1;

            $model->save();
        }
    }

}