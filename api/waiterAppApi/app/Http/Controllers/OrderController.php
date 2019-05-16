<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use DB;

class OrderController extends Controller
{
    public function showOrder(){
       
        return DB::table('orders')
        ->join('clients', 'clients.id', '=', 'orders.idClient')
        ->join('tables', 'tables.id', '=', 'orders.idTable')
        ->get();;

    }

    public function showSpecificOrder(Order $order){
       
        return $order;

    }

    //Pegar dados inseridos na tela
    public function createOrder(Request $request){ 

        $request->validate([ //validação dos campos
            'priceOrder'=>'required|numeric',
            'status'=>'required',
            'typePayment'=>'required',
            'idClient'=>'required|numeric',
            'idTable' =>'required|numeric',
            
        ]);
        //pegar dados do input e inserir no banco de dados
        //Configurar MODEL (habilitar linhas editáveis)

        $order = Order::create([
            'priceOrder'=>$request->input('priceOrder'),
            'status'=>$request->input('status'),
            'typePayment'=>$request->input('typePayment'),
            'idClient'=>$request->input('idClient'),
            'idTable'=>$request->input('idTable'),
        ]);

        return $order;
        
    }

    public function updateOrder(Request $request, Order $typePayment){
        
        $typePayment->typePayment = $request->input('typePayment');
        $typePayment->save();

        return $typePayment;

    }

    public function deleteOrder(Order $order){
        $order->delete();
        return response()->json(['success'=>true]);
    }
}
