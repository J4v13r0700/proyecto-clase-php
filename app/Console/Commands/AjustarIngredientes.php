<?php

namespace App\Console\Commands;

use App\Models\FormPizza\Ingrediente;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class AjustarIngredientes extends Command
{

   /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pizzas:ingredientes {--ingrediente= : Ingrediente}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync Reports with resources/templates/reports.json';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $model = Ingrediente::where('id', $this->option('ingrediente'))
                    ->where('cantidad', '<', 0)->get();

        if($model){
            $model[0]->cantidad = 0;
            $model[0]->save();
            Log::info('Actualizado');
        }

        Log::info('Objeto previamente Actualizado');
    }



}