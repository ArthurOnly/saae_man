<?php

namespace App\Http\Controllers;

use App\Models\operation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OperationController extends Controller
{
    public function index(){
        return view("registerOperation");
    }

    public function create(Request $request){
        
        $lat = 0; 
        $long = 0;
        if (empty($request->lat) or empty($request->long)){
            $addressFull = "$request->street $request->number, Ceará-Mirim - Rio Grande do Norte,, Brazil";
            $apiKey = config("app.position_api_key");
            $url = "http://api.positionstack.com/v1/forward?access_key=$apiKey&query=$addressFull";
            
            $responseLocation = Http::get($url)->json();
            $lat = $responseLocation['data'][0]['latitude'];
            $long = $responseLocation['data'][0]['longitude'];
        } else{
            $lat = $request->lat;
            $long = $request->long;
        } 
        

        $data = [
            "order" => $request->order,
            "subscription" => $request->subscription,
            "lat" => $lat,
            "long" => $long,
            "order" => $request->order,
            "address" => $request->street.",".$request->number." - CEARA MIRIM/RN",
            "completed" => false
        ];
        
        Operation::create($data);
        
        return redirect('/')->with('message', ["type" => "success", "text" => "Criado com sucesso"]);;
    }

    public function finish($order){
        return view("finishOperation", ["order" => $order]);
    }

    public function finishHandler($order){
        $operation = Operation::firstWhere('order', $order);
        $operation->completed = 1;
        $operation->save();

        return redirect('/')->with('message', ["type" => "success", "text" => "Finalizado com sucesso"]);;
    }
}
