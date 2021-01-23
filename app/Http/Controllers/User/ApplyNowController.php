<?php

namespace App\Http\Controllers\User;

use App\SiteConfig;
use App\ApplyNow;
use App\Course;
use App\StudentProfile;
use App\Education;
use App\Configuration;
use Carbon\Carbon;
use File;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
class ApplyNowController extends Controller
{
    public function index(){
    	return view('user.applyNow.index');
    }

    // public function print($id){
    //     $siteConfig = SiteConfig::first();
    //     // dd($siteConfig->toArray());
    //     $printdata = ApplyNow::findorFail($id)->first();
    //     // dd($printdata->toArray());
    //     return view('print',compact('printdata','siteConfig'));
    // }

    public function applyStudentform(Request $request){
      $student = new StudentProfile;
        $student->year_id = $request->year_id;
        $student->session_id = $request->session_id;
        $student->course_id = $request->course_id;
        $student->batch_id = $request->batch_id;
        $year = strval($request->year_id);
        $session = strval($request->session_id);
        $course = strval($request->course_id);
        $batch = strval($request->batch_id);
        $last_row = StudentProfile::orderBy('id', 'DESC')->first();
        if (empty($last_row)) {
            $id = 0;
        }else{
            $id = $last_row->id;
        }
        $last = strval($id+1);

        $student->student_id = $year.$session.$course.$batch.$last;
        $student->student_name = $request->student_name;
        $student->blood_group = $request->blood_group;
        $student->gender = $request->gender;
        $student->date_of_birth = $request->date_of_birth;
        $student->religion = $request->religion;
        $student->nationality = $request->nationality;
        $student->profession     = $request->profession;
        $student->organization_name     = $request->organization_name;
        $student->designation = $request->designation;
        $student->phone= $request->phone;
        $student->email= $request->email;
        $student->present_address= $request->present_address;
        $student->permanent_address= $request->permanent_address;
        $student->father_name= $request->father_name;
        $student->father_phone= $request->father_phone;
        $student->mother_name= $request->mother_name;
        $student->mother_phone= $request->mother_phone;
        $student->status= 2;
        // $image = $request->file('photo');
        if ($request->hasFile('photo')) {
            $std_img = $request->photo;
            $name_gen = hexdec(uniqid()).'.'.$std_img->getClientOriginalExtension();
            $folderpath = 'uploads/studentprofile/';
            Image::make($std_img)->resize(200, 200)->save($folderpath.$name_gen);
        }
        $student->photo = $name_gen;
        $student->save();

        $student_id = StudentProfile::orderBy('id', 'DESC')->first();
        $id = $student_id->id;
        foreach ($request->exam_name as $key => $exams_name) {
            $education = new Education;
            $education->student_id = $id;
            $education->exam_name = $request->exam_name[$key];
            $education->institute_name = $request->institute_name[$key];
            $education->board = $request->board[$key];
            $education->roll = $request->roll[$key];
            $education->year = $request->year[$key];
            $education->result = $request->result[$key];
            $education->status = 1;
            $education->save();
        }
        return back();
    }
}
