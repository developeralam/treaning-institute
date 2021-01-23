<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function Students(){

    	return  $this->belongsTo(StudentProfile::class);
    }

     public function ApplyNow(){

    	return  $this->belongsTo(ApplyNow::class,'course','id');
    }

    //get All Cource
    public static function getAllCourse()
    {
    	return Course::all();
    }
}
