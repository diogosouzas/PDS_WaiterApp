<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\PreparationOrder;

class PreparationOrderController extends Controller
{
    public function showPreparationOrder(){
       
        return DB::table('preparation_orders')
        ->join('orders', 'orders.id', '=', 'additional_categories.idOrder')
        ->join('preparations', 'preparations.id', '=', 'additional_categories.idPreparation')
        ->get();;
    }

    public function showSpecificPreparationOrder(PreparationOrder $preparationOrder){
       
        return $preparationOrder;

    }

    //Pegar dados inseridos na tela
    public function createPreparationOrder(Request $request){ 

        $request->validate([ //validação dos campos
            'idOrder'=>'required|numeric',  
            'idPreparation'=>'required|numeric',
        ]);
    
        $preparationOrder = PreparationOrder::create([
            'idOrder'=>$request->input('idOrder'),
            'idPreparation'=>$request->input('idPreparation'),
        ]);

        return $preparationOrder;
    
    }

    public function updatePreparationOrder(Request $request, PreparationOrder $preparationOrder){
        
        $preparationOrder->idPreparation = $request->input('idPreparation');
        $preparationOrder->save();

        return $preparationOrder;

    }

    public function deleteAdditionalCategory(AdditionalCategory $additionalCategory){
        $additionalCategory->delete();
        return response()->json(['success'=>true]);
    }
}
