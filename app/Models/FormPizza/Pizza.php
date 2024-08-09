<?php

namespace App\Models\FormPizza;

use App\Models\FormPizza\Orden;
use App\Models\FormPizza\Ingrediente;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{

    public function ingredientes()
    {
        return $this->belongsToMany(Ingrediente::class, 'ingredientes_pizza', 'id_pizza', 'id_ingredient');
    }

    public function orden()
    {
        return $this->belongsTo(Orden::class);
    }


    /*public pizaaTest()
    {

        $pizza = 
        {
            "id": 1,
            "numero_orden": 112312
            "id_cliente": 1
            "pizzas": [
                {
                    "id": 1,
                    "name": "Peperoni",
                    "size": "Mediana",
                    "ingredientes": [
                        {
                            "id": 1,
                            "name": "Queso",
                        },
                        {
                            "id": 2,
                            "name": "Peperoni",
                        }
                    ]
                },

                {
                    "id": 2,
                    "name": "Peperoni",
                    "size": "Mediana",
                    "ingredientes": [
                        {
                            "id": 1,
                            "name": "Queso",
                        },
                        {
                            "id": 2,
                            "name": "Peperoni",
                        }
                    ]
                }
            ]
        }
    }*/

}