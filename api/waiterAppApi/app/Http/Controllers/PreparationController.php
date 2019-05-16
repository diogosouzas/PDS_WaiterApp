<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Preparation;
use DB;

class PreparationController extends Controller
{
    public function showPreparation(){
       
        return DB::table('preparations')
        ->join('orders', 'orders.id', '=', 'preparations.idOrder')
        ->join('companies', 'companies.id', '=', 'products.idCompany')
        ->get();;

    }

    public function showSpecificPreparation(Preparation $preparation){
       
     return $preparation;

    }

    //Pegar dados inseridos na tela
    public function createPreparation(Request $request){ 

        $request->validate([ //validação dos campos
            'reservations'=>'required|max:180',
            'status'=>'required',       
        ]);

        $preparation = Preparation::create([
            'reservations'=>$request->input('reservations'),
            'status'=>$request->input('status'),
        ]);

        return $preparation;
        
    }

    public function updatePreparation(Request $request, Preparation $preparation){
        
        $preparation->nameProduct = $request->input('reservations');
        $preparation->save();

        return $preparation;

    }

    public function deletePreparation(Preparation $preparation){

        $preparation->delete();
        return response()->json(['success'=>true]);

    }
}
