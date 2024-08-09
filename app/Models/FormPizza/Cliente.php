<?php

namespace App\Models\FormPizza;

use App\Models\FormPizza\Orden;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public function orden()
    {
        return $this->hasOne(Orden::class);
    }
}