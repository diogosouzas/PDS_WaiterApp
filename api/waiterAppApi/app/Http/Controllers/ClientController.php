<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    public function showClient(){
       
        return Client::all(); //Retornar o model --> Select ALL no banco de dados

    }

    public function showSpecificClient(Client $client){
       
        return $client;

    }

    //Pegar dados inseridos na tela
    public function createClient(Request $request){ 

        $request->validate([ //validação dos campos
            'nameClient'=>'required|max:100|min:5',
            'emailClient'=>'required|max:100|min:5|regex:/^.+@.+$/i',
            'phoneClient'=>'required|numeric|min:10',
            'userName'=>'required|min:5',
            'password'=>'required|min:8'
        ]);
        //pegar dados do input e inserir no banco de dados
        //Configurar MODEL (habilitar linhas editáveis)

        $client = Client::create([
            'nameClient'=>$request->input('nameClient'),
            'emailClient'=>$request->input('emailClient'),
            'phoneClient'=>$request->input('phoneClient'),
            'userName'=>$request->input('userName'),
            'password'=>$request->input('password'),
        ]);

        return $client;
        //return $request->all(); //('nameClient'); //Setar de acordo com as variáveis que se deseja receber
    }

    public function updateClient(Request $request, Client $client){
        
        $client->nameClient = $request->input('nameClient');
        $client->save();

        return $client;

    }

    public function deleteClient(Client $client){
        $client->delete();
        return response()->json(['success'=>true]);
    }
}
