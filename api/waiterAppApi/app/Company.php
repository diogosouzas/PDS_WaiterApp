<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['nameCompany', 'emailCompany', 'phoneCompany', 'userName', 'password'];
}
