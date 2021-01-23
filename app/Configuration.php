<?php

namespace App;

use App\StudentProfile;
use App\StudentPayment;
use App\ApplyNow;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    public function students(){

    	return  $this->belongsToMany(StudentProfile::class);
    
    }

     public function applynow(){

    	return  $this->belongsTo(ApplyNow::class);
    }

    public function studentPayment(){

    	return  $this->belongsToMany(StudentPayment::class);
    
    }
}
