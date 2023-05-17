<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;


class GatewayController extends Controller
{

    public function sendNode(Request $request){

        $data = $request->all();
        $respuesta = Http::post('http://localhost:3080/tutorials', $data);

        if($respuesta->successful()){
            $respuestaData = $respuesta->body();
            //Devuelvo la respuesta de la anterior api
            return response()->json(['Respuesta' => $respuestaData, 200]);
        }else{
            //En caso de error en la solicitud http
            return response()->json(['error' => 'Error en la solicitud a la Api externa'], 500);
        }
    }


    public function getApiGo(){
        $respuesta = Http::get('http://localhost:8000/tutorials');

        if($respuesta->successful()){
            $respuestaData = $respuesta->json();

            //Devuelvo la respuesta de la anterior api
            return response()->json($respuestaData);
        }else{
            //En caso de error en la solicitud http
            return response()->json(['error' => 'Error en la solicitud a la Api externa'], 500);
        }
    }


    public function deleteApiPython(Request $request){
        $data = $request->all();
        $respuesta = Http::post('http://localhost:5000/deleteTutorial', $data);

        if($respuesta->successful()){
            $respuestaData = $respuesta->body();

            //Devuelvo la respuesta de la anterior api
            return response()->json(['Respuesta' => $respuestaData, 200]);
        }else{
            //En caso de error en la solicitud http
            return response()->json(['error' => 'Error en la solicitud a la Api externa'], 500);
        }
    }

}
