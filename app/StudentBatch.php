<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\StudentProfile;
class StudentBatch extends Model
{
    protected $guarded=[''];

    public function studentProfile(){
        return $this->belongsTo(StudentProfile::class);
    }
    //Get All Batch
    public static function getAllBatch()
    {
    	return StudentBatch::all();
    }

    //Get Batch Name
    public function course()
    {
    	return $this->belongsTo(Course::class, 'course_id');
    }
}
