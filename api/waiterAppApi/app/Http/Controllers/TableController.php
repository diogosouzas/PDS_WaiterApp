<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Table;

class TableController extends Controller
{
    public function showTable(){
       
        return Table::all(); //Retornar o model --> Select ALL no banco de dados

    }

    //retornar empresa específica
    public function showSpecificTable(Table $table){
       
        return $table;

    }

    public function createTable(Request $request){ 

        $request->validate([ //validação dos campos
            'numberTable'=>'required|numeric|max:100|',
            'status'=>'required',
        ]);
        //pegar dados do input e inserir no banco de dados
        //Configurar MODEL (habilitar linhas editáveis)

        $table = Table::create([
            'numberTable'=>$request->input('numberTable'),
            'status'=>$request->input('status'),

        ]);

        return $table;
        
    }

    public function updateTable(Request $request, Table $table){
        
        $table->numberTable = $request->input('numberTable');
        $table->save();

        return $table;

    }

    public function deleteTable(Table $table){
        $table->delete();
        return response()->json(['success'=>true]);
    }
}