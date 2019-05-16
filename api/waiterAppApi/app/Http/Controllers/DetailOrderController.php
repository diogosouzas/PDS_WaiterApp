<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailOrder;
use DB;

class DetailOrderController extends Controller
{
    public function showDetailOrder(){
       
        return DB::table('detail_orders')
        ->leftJoin('products', 'products.id', '=', 'detail_orders.idProduct')
        ->select()
        ->get();;

    }

    public function showSpecificDetailOrder(DetailOrder $detailOrder){
       
        return $detailOrder;

    }

    //Pegar dados inseridos na tela
    public function createDetailOrder(Request $request){ 

        $request->validate([ //validação dos campos
            'amount'=>'required|numeric',
            'unitPrice'=>'required|numeric',
            'fullPrice'=>'required|numeric',
            'reservations',
            'idProduct' =>'required|numeric',
            //'idOrder' =>'required|numeric',
 
        ]);
        //pegar dados do input e inserir no banco de dados
        //Configurar MODEL (habilitar linhas editáveis)

        $detailOrder = DetailOrder::create([
            'amount'=>$request->input('amount'),
            'unitPrice'=>$request->input('unitPrice'),
            'fullPrice'=>$request->input('fullPrice'),
            'reservations'=>$request->input('reservations'),
            'idProduct'=>$request->input('idProduct'),
            //'idOrder'=>$request->input('idOrder'),
        ]);

        return $detailOrder;
        
    }

    public function updateDetailOrder(Request $request, DetailOrder $detailOrder){
        
        $detailOrder->reservations = $request->input('reservations');
        $detailOrder->save();

        return $detailOrder;

    }

    public function deleteDetailOrder(DetailOrder $detailOrder){
        $detailOrder->delete();
        return response()->json(['success'=>true]);
    }
}
