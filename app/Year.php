<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    //

    //Get All Year
    public static function getAllYear()
    {
    	return Year::all();
    }
}
