<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;

class UpdateIngredientes
{
    use Dispatchable;

    public $ingredientes_id;

    public function __construct($ingredientes_id)
    {
        $this->ingredientes_id = $ingredientes_id;
    }

}