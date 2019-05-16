<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['idCompany','nameProduct', 'priceProduct','idCategory', 'priceProduct', 'description'];
}
