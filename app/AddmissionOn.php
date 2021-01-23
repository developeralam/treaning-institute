<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddmissionOn extends Model
{
    //Get All Admission
    public static function getAllAdmission()
    {
    	return AddmissionOn::all();
    }
}
