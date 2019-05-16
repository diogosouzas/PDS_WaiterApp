<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{
    public function showCompany(){
       
        return Company::all(); //Retornar o model --> Select ALL no banco de dados

    }

    //retornar empresa específica
    public function showSpecificCompany(Company $company){
       
        return $company;

    }

    public function createCompany(Request $request){ 

        $request->validate([ //validação dos campos
            'nameCompany'=>'required|max:100|min:5',
            'emailCompany'=>'required|max:100|min:5|regex:/^.+@.+$/i',
            'phoneCompany'=>'required|numeric|min:10',
            'userName'=>'required|min:5',
            'password'=>'required|min:8'
        ]);
        //pegar dados do input e inserir no banco de dados
        //Configurar MODEL (habilitar linhas editáveis)

        $company = Company::create([
            'nameCompany'=>$request->input('nameCompany'),
            'emailCompany'=>$request->input('emailCompany'),
            'phoneCompany'=>$request->input('phoneCompany'),
            'userName'=>$request->input('userName'),
            'password'=>$request->input('password'),
        ]);

        return $company;
        
    }

    public function updateCompany(Request $request, Company $company){
        
        $company->nameCompany = $request->input('nameCompany');
        $company->save();

        return $company;

    }

    public function deleteCompany(Company $company){
        $company->delete();
        return response()->json(['success'=>true]);
    }
}
