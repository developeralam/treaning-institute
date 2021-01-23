<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentSession extends Model
{
    protected $guarded=['id'];

    public function students(){
        return $this->hasMany(StudentProfile::class);
    }

    //Get All Sessions
    public static function getAllSession()
    {
    	return StudentSession::all();
    }

    //get Year
    public function year()
    {
    	return $this->belongsTo(Year::class, 'year_id');
    }
}
