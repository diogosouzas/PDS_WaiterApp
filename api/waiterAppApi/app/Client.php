<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
     protected $fillable = ['nameClient', 'emailClient', 'phoneClient', 'userName', 'password'];
}
