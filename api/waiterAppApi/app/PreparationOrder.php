<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreparationOrder extends Model
{
    protected $fillable = ['idOrder', 'idPreparation'];
}
