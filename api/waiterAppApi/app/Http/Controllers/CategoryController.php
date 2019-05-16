<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function showCategory(){
       
        return Category::all(); //Retornar o model --> Select ALL no banco de dados

    }

    //retornar empresa específica
    public function showSpecificCategory(Category $category){
       
        return $category;

    }

    public function createCategory(Request $request){ 

        $request->validate([ //validação dos campos
            'nameCategory'=>'required|max:100|min:5',
            'descriptionCategory'=>'required|max:250|min:5',
        ]);
        //pegar dados do input e inserir no banco de dados
        //Configurar MODEL (habilitar linhas editáveis)

        $category = Category::create([
            'nameCategory'=>$request->input('nameCategory'),
            'descriptionCategory'=>$request->input('descriptionCategory'),
        ]);

        return $category;
        
    }

    public function updateCategory(Request $request, Category $category){
        
        $category->nameCategory = $request->input('nameCategory');
        $category->save();

        return $category;

    }

    public function deleteCategory(Category $category){
        $category->delete();
        return response()->json(['success'=>true]);
    }
}
