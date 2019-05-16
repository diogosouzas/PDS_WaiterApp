<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Additional;

class AdditionalController extends Controller
{
    public function showAdditional(){
       
        return Additional::all(); //Retornar o model --> Select ALL no banco de dados

    }

    public function showSpecificAdditional(Additional $additional){
       
        return $additional;

    }

    //Pegar dados inseridos na tela
    public function createAdditional(Request $request){ 

        $request->validate([ //validação dos campos
            'nameAdditional'=>'required|max:100|min:5',
            'descriptionAdditional'=>'required|max:100|min:5',
            'priceAdditional'=>'required|numeric',
            
        ]);
        //pegar dados do input e inserir no banco de dados
        //Configurar MODEL (habilitar linhas editáveis)

        $additional = Additional::create([
            'nameAdditional'=>$request->input('nameAdditional'),
            'descriptionAdditional'=>$request->input('descriptionAdditional'),
            'priceAdditional'=>$request->input('priceAdditional'),

        ]);

        return $additional;
        //return $request->all(); //('nameClient'); //Setar de acordo com as variáveis que se deseja receber
    }

    public function updateAdditional(Request $request, Additional $additional){
        
        $additional->nameAdditional = $request->input('nameAdditional');
        $additional->save();

        return $additional;

    }

    public function deleteAdditional(Additional $additional){
        $additional->delete();
        return response()->json(['success'=>true]);
    }
}
