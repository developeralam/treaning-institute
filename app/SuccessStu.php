<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuccessStu extends Model
{
    //Get All Success Student
    public static function getAllSuccessStu()
    {
    	return SuccessStu::all();
    }
}
