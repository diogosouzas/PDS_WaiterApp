<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    protected $fillable = ['amount', 'unitPrice', 'fullPrice', 'reservations', 'idProduct'];

}
