<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Additional extends Model
{
    protected $fillable = ['nameAdditional', 'descriptionAdditional', 'priceAdditional'];

    //protected $table = ['additional'];
}
