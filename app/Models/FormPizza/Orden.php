<?php

namespace App\Models\FormPizza;

use App\Models\FormPizza\Pizza;
use App\Models\FormPizza\Cliente;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{

    protected $table = "ordenes";

    public function pizzas()
    {
        return $this->hasMany(Pizza::class, 'id_orden');
    } 

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}