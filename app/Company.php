<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    public $fillable = ['name','address','website','email'];

}
