<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;

class ProductController extends Controller
{
    public function showProduct(){
       
        return DB::table('products')
        ->join('categories', 'categories.id', '=', 'products.idCategory')
        ->join('companies', 'companies.id', '=', 'products.idCompany')
        ->get();;

    }

    public function showSpecificProduct(Product $product){
       
     return $product;

    }

    //Pegar dados inseridos na tela
    public function createProduct(Request $request){ 

        $request->validate([ //validação dos campos
            'idCategory'=>'required|numeric',
            'idCompany'=>'required|numeric',
            'nameProduct'=>'required|max:100|min:5',
            'priceProduct'=>'required|numeric|',
            'description'=>'required|max:250',            
        ]);

        //pegar dados do input e inserir no banco de dados
        //Configurar MODEL (habilitar linhas editáveis)

        $product = Product::create([
            'idCategory'=>$request->input('idCategory'), //talves dê erro!!!
            'idCompany'=>$request->input('idCompany'),
            'nameProduct'=>$request->input('nameProduct'),
            'priceProduct'=>$request->input('priceProduct'),
            'description'=>$request->input('description'),
        ]);

        return $product;
        
    }

    public function updateProduct(Request $request, Product $product){
        
        $product->nameProduct = $request->input('nameProduct');
        $product->save();

        return $product;

    }

    public function deleteProduct(Product $product){

        /*$table->foreign('idCategory')
              ->references('id')->on('categories')
              ->onDelete ('cascade');
        */
        $product->delete();
        return response()->json(['success'=>true]);

    }
}
