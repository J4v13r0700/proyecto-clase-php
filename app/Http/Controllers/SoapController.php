<?php 

namespace App\Http\Controllers;

use App\Clients\WSSoapClient;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SoapController extends Controller
{

    public function soapCall(Request $req)
    {

        try{

            $wsdl = 'https://www.dataaccess.com/webservicesserver/NumberConversion.wso?WSDL';

            $option = [
                'user' => 'dev',
                'password' => 'test',
                'trace' => true,
                'cache_wsdl' => WSDL_CACHE_NONE
            ];


            $client = new \SoapClient($wsdl, $option);

            $params = ["ubiNum" => $req->input('number')];

            $response = $client->__soapCall('NumberToWords', [$params]);

            var_dump($response);

            $result = $response->NumberToWordsResult; 

            return response()->json(['result' => $result]);
        
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        } 
    }


    public function wsSoapCall(Request $req)
    {

        try{

            $wsdl = 'https://www.dataaccess.com/webservicesserver/NumberConversion.wso?WSDL';

            $option = [
                'user' => 'dev',
                'password' => 'test',
                'trace' => true,
                'cache_wsdl' => WSDL_CACHE_NONE
            ];


            $client = new WSSoapClient($wsdl, $option, 'user', 'password');

            $params = [
                "ubiNum" => $req->input('number'),
                "testparam" => $req->input('number')
            ];

            $response = $client->__soapCall('NumberToWords', [$params]);

            var_dump($response);

            $result = $response->NumberToWordsResult; 

            return response()->json(['result' => $result]);
        
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        } 
    }



}