<?php

use Illuminate\Http\Request;

//Routes Client

Route::get("client", "ClientController@showClient"); //Retornar clientes cadastrados
Route::get("client/{client}", "ClientController@showSpecificClient"); //Retornar dados por parâmetro (dado específico)
Route::post("client", "ClientController@createClient");
Route::patch("client/{client}", "ClientController@updateClient");
Route::delete("client/{client}", "ClientController@deleteClient");

//Routes Company

Route::get("company", "CompanyController@showCompany"); 
Route::get("company/{company}", "CompanyController@showSpecificCompany");
Route::post("company", "CompanyController@createCompany");
Route::patch("company/{company}", "CompanyController@updateCompany");
Route::delete("company/{company}", "CompanyController@deleteCompany");

//Routes Table

Route::get("table", "TableController@showTable"); 
Route::get("table/{table}", "TableController@showSpecificTable");
Route::post("table", "TableController@createTable");
Route::patch("table/{table}", "TableController@updateTable");
Route::delete("table/{table}", "TableController@deleteTable");

//Routes Products

Route::get("products", "ProductController@showProduct"); 
Route::get("products/{product}", "ProductController@showSpecificProduct");
Route::post("products", "ProductController@createProduct");
Route::patch("products/{product}", "ProductController@updateProduct");
Route::delete("products/{product}", "ProductController@deleteProduct");

//Routes Categories

Route::get("categories", "CategoryController@showCategory"); 
Route::get("categories/{category}", "CategoryController@showSpecificCategory");
Route::post("categories", "CategoryController@createCategory");
Route::patch("categories/{category}", "CategoryController@updateCategory");
Route::delete("categories/{category}", "CategoryController@deleteCategory");

//Routes Additional

Route::get("additional", "AdditionalController@showAdditional"); 
Route::get("additional/{additional}", "AdditionalController@showSpecificAdditional");
Route::post("additional", "AdditionalController@createAdditional");
Route::patch("additional/{additional}", "AdditionalController@updateAdditional");
Route::delete("additional/{additional}", "AdditionalController@deleteAdditional");

//Routes Additional has category

Route::get("additionalCategory", "AdditionalCategoryController@showAdditionalCategory"); 
Route::get("additionalCategory/{additionalCategory}", "AdditionalCategoryController@showSpecificAdditionalCategory");
Route::post("additionalCategory", "AdditionalCategoryController@createAdditionalCategory");
Route::patch("additionalCategory/{additionalCategory}", "AdditionalCategoryController@updateAdditionalCategory");
Route::delete("additionalCategory/{additionalCategory}", "AdditionalCategoryController@deleteAdditionalCategory");


//Routes Product

Route::get("/product", "ProductController@showProduct"); 
Route::get("product/{product}", "ProductController@showSpecificProduct");
Route::post("product", "ProductController@createProduct");
Route::patch("product/{product}", "ProductController@updateProduct");
Route::delete("product/{product}", "ProductController@deleteProduct");

//Routes order

Route::get("/order", "OrderController@showOrder"); 
Route::get("order/{order}", "OrderController@showSpecificOrder");
Route::post("order", "OrderController@createOrder");
Route::patch("order/{order}", "OrderController@updateOrder");
Route::delete("order/{order}", "OrderController@deleteOrder");

//Routes detail order

Route::get("/detailOrder", "DetailOrderController@showDetailOrder"); 
Route::get("detailOrder/{detailOrder}", "DetailOrderController@showSpecificDetailOrder");
Route::post("detailOrder", "DetailOrderController@createDetailOrder");
Route::patch("detailOrder/{detailOrder}", "DetailOrderController@updateDetailOrder");
Route::delete("detailOrder/{detailOrder}", "DetailOrderController@deleteDetailOrder");

//Routes preparations

Route::get("/preparation", "PreparationController@showPreparation"); 
Route::get("preparation/{preparation}", "PreparationController@showSpecificPreparation");
Route::post("preparation", "PreparationController@createPreparation");
Route::patch("preparation/{preparation}", "PreparationController@updatePreparation");
Route::delete("preparation/{preparation}", "PreparationController@deletePreparation");

//Routes preparation orders 

Route::get("/preparationOrder", "PreparationOrderController@showPreparationOrder"); 
Route::get("preparationOrder/{preparationOrder}", "PreparationOrderController@showSpecificPreparationOrder");
Route::post("preparationOrder", "PreparationOrderController@createPreparationOrder");
Route::patch("preparationOrder/{preparationOrder}", "PreparationOrderController@updatePreparationOrder");
Route::delete("preparationOrder/{preparationOrder}", "PreparationOrderController@deletePreparationOrder");