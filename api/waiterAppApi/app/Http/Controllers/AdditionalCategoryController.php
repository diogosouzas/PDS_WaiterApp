<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdditionalCategory;
use DB;

class AdditionalCategoryController extends Controller
{
    public function showAdditionalCategory(){
       
        return DB::table('additional_categories')
        ->join('categories', 'categories.id', '=', 'additional_categories.idCategory')
        ->join('additionals', 'additionals.id', '=', 'additional_categories.idAdditional')
        ->get();;
    }

    public function showSpecificAdditionalCategory(AdditionalCategory $additionalCategory){
       
        return $additionalCategory;

    }

    //Pegar dados inseridos na tela
    public function createAdditionalCategory(Request $request){ 

        $request->validate([ //validação dos campos
            'idCategory'=>'required|numeric',  
            'idAdditional'=>'required|numeric',
        ]);
    
        $additionalCategory = AdditionalCategory::create([
            'idCategory'=>$request->input('idCategory'),
            'idAdditional'=>$request->input('idAdditional'),
        ]);

        return $additionalCategory;
        //return $request->all(); //('nameClient'); //Setar de acordo com as variáveis que se deseja receber
    }

    public function updateAdditionalCategory(Request $request, AdditionalCategory $additionalCategory){
        
        $additionalCategory->nameAdditional = $request->input('nameAdditional');
        $additionalCategory->save();

        return $additionalCategory;

    }

    public function deleteAdditionalCategory(AdditionalCategory $additionalCategory){
        $additionalCategory->delete();
        return response()->json(['success'=>true]);
    }
}
