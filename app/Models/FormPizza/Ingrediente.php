<?php

namespace App\Models\FormPizza;

use App\Models\FormPizza\Pizza;
use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{

    public function pizzas()
    {
        return $this->belongsToMany(Pizza::class, 'ingredientes_pizza',  'id_ingredient', 'id_pizza');
    }
}