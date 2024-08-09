<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Http;
use App\Models\FormPizza\Orden;


class UpdatePago implements ShouldQueue
{

    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    protected $ordenId;
    protected $endpoint;

    //public $tries = 5;
    //public $timeout = 120;


    public function __construct($id)
    {
        $this->ordenId = $id;
        $this->endpoint = 'http://localhost:3000/transaccion';
    }


    public function handle()
    {
        try{
            $response = Http::get( $this->endpoint );
            // successful(), clientError(), serverError()

            if($response->successful()) {
                $data = $response->json();
                
                $model = Orden::where('id', $this->ordenId)
                                ->where('status', 'pending')->first();

                if($data['status'] != 'pending'){
                    $model->status = $data['status'];
                    $model->save();
                }else{
                    $this->release(30);
                }

            }else{
                //$this->release(30);
                //$this->fail($response);
            }
        } catch(\Exception $e) {
            echo 'error';
            $this->fail($e);
        }
    }

    public function failed($exception)
    {
        echo $exception->getMessage();
    }
}