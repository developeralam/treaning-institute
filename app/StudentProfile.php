<?php

namespace App;

use App\Course;
use App\Configuration;
use App\StudentBatch;
use App\StudentPayment;
use App\Session;
use App\StudentSession;
use App\Transactions\StudentChart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StudentProfile extends Model
{   
    //Get All Student
    public static function getAllStudent()
    {
        return StudentProfile::all();
    }

    //Get Batch Name
    public function batch()
    {
        return $this->belongsTo(StudentBatch::class, 'batch_id');
    }

    //Get Course Name
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    //Get Session Name
    public function session()
    {
        return $this->belongsTo(StudentSession::class, 'session_id');
    }

    //Check Status
    public static function statusCheck($id)
    {
        $data = "";
        if ($id == 1) {
            $data = "Active";
        }else if($id == 0){
            $data = "Inactive";
        }else if($id == 2){
            $data = "Pending";
        }else if($id == 3){
            $data = "Passed";
        }
        return $data;
    }
    //Get 
    // public function courses(){
    // 	return  $this->hasMany(Course::class,'id','courseName');
    // }
    // public function studentBatches(){
    //     return $this->hasMany(StudentBatch::class, 'id','batch');
    // }
    // public function studentSession(){
    //     return $this->belongsTo(StudentSession::class,'session','id');
    // }
    // public function configurations(){
    // 	return  $this->belongsToMany(Configuration::class);
    // }

    // public function studentPayment(){
    // 	return  $this->belongsToMany(StudentPayment::class);
    // }
    // public function student_charts(){
    //     return $this->hasMany(StudentChart::class, 'id');
    // }



    // public static function findName($id){
    //     $d = DB::table('configurations')->select('data')->where('id',$id)->first();
    //     if(isset($d->data)){
    //         return $d->data;
    //     } else {
    //         return "No Data";
    //     }
    // }

    //Get Pending Student
    public static function getAllPendingStudent()
    {
        return StudentProfile::where('status', 2)->get();
    }
    
}
