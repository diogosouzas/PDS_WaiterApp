<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preparation extends Model
{
    protected $fillable = ['reservations', 'status', 'idOrder'];
}
