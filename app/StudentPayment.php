<?php

namespace App;

use App\StudentProfile;
use App\Account;
use App\Configuration;
use App\Transactions\StudentChart;
use App\Transactions\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StudentPayment extends Model
{
    public static function boot()
    {
        parent::boot();
        static::deleting(function($model){

            $model->charts->each->delete();

            foreach ($model->charts as $chart) {
                $chart->payment->each->delete();
            }
        });
    }

 

    //  protected $fillable = [
    //     'student_id', 'date', 'amount', 
    // ];   

    //Get All Student Payment
    public static function getAllStudentPayment()
    {
        return StudentPayment::all();
    }
    //Get Student Information
    public function student()
    {
        return $this->belongsTo(StudentProfile::class, 'student_id');
    }
    //Get Chart Name
    public function chart()
    {
        return $this->belongsTo(StudentChart::class, 'type');
    }

    public function charts(){
        
        return $this->hasMany(StudentChart::class);
    }
    //     public function studentProfile(){
    //
    //    	return  $this->belongsToMany(StudentProfile::class);
    //
    //    }
     public function studentProfile(){

    	return  $this->belongsToMany(StudentProfile::class);

    }
    public function configurations(){

    	return  $this->belongsToMany(Configuration::class);
    
    }
    public function accounts(){

    	return  $this->belongsToMany(Account::class);
    
    }

    //  public static function findName($id){
    // 	return DB::table('accounts')->select('name_of_account')->where('id',$id)->first()->name_of_account;
    // }
    public static function findStudentName($id){

        if( is_null($id) ){
            dd( "There's no Student with the id=".$id);
       }
   
       $d =  DB::table('student_profiles')->select('name')->where('id',$id)->first();
       return $d->name??null;
    }

    // public function payment()
    // {
    //     return $this->morphMany(Transaction::class, 'transactionable');
    // }

    //Get Session Name For Student Payment Report
    public static function sessionName($id)
    {
        $student = StudentProfile::find($id);
        $session = StudentSession::find($student->session_id);
        return $session->session_name;
    }
    //Get Batch Name For Student Payment Report
    public static function batchName($id)
    {
        $student = StudentProfile::find($id);
        $batch = StudentBatch::find($student->batch_id);
        return $batch->batch_name;
    }
    //Get Student Name For Student Payment Report
    public static function studentName($id)
    {
        $student = StudentProfile::find($id);
        return $student->student_name;
    }
    //Get Student Name For Student Payment Report
    public static function studentId($id)
    {
        $student = StudentProfile::find($id);
        return $student->student_id;
    }
    //Get Course Name For Student Payment Report
    public static function courseName($id)
    {
        $student = StudentProfile::find($id);
        $course = Course::find($student->course_id);
        return $course->title;
    }

    
}
