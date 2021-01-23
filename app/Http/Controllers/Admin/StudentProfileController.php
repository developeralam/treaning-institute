<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\ApplyNow;
use App\StudentBatch;
use App\StudentProfile;
use App\Education;
use App\Course;
use App\Configuration;
use App\SiteConfig;
use App\StudentSession;
use App\Sms;
use App\SmsSwitch;
use Carbon\Carbon;
use File;
use illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Image;

class StudentProfileController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
 
    public function search(Request $request){

        if($request->batch == 'null' && $request->session == 'null' && $request->course == 'null'){
            // return '3 null';
            $items = StudentProfile::with('studentBatches','courses','studentSession')
            ->orderBy('batch')->get();
        }
        elseif($request->batch != 'null' && $request->session != 'null' && $request->course != 'null'){
            // return '3 not null';
            $items = StudentProfile::with('studentBatches','courses','studentSession')
            ->where('batch',$request->batch)
            ->where('session',$request->session)
            ->where('courseName',$request->course)
            ->orderBy('id')->get();
        }
        else{
            // if( $request->batch == 'null' && $request->session == 'null' ||
            //     $request->batch == 'null' && $request->course == 'null' ||
            //     $request->session == 'null' && $request->course == 'null'
            // ){
            //     return 'curse asenai';
            //     $items = StudentProfile::with('studentBatches','courses','studentSession')
            //     ->orderBy('batch')->get();
            // }
            // else
            if($request->batch != 'null' && $request->session != 'null'){
                // return 'bs not null';
                $items = StudentProfile::with('studentBatches','courses','studentSession')
                        ->where('batch',$request->batch)
                        ->where('session',$request->session)
                        ->orderBy('batch')->get();
            }
            elseif($request->batch !== 'null' && $request->course != 'null'){
                // return 'bC not null';
                $items = StudentProfile::with('studentBatches','courses','studentSession')
                        ->where('batch',$request->batch)
                        ->where('courseName',$request->course)
                        ->orderBy('batch')->get();
            }
            elseif($request->session != 'null' && $request->course != 'null'){
                // return 'SC not null';
                $items = StudentProfile::with('studentBatches','courses','studentSession')
                        ->where('session',$request->session)
                        ->where('courseName',$request->course)
                        ->orderBy('batch')->get();
            }
            else{
                if($request->batch != 'null'){
                    // return 'batch';
                    $items = StudentProfile::with('studentBatches','courses','studentSession')->where('batch',$request->batch)
                    ->orderBy('batch')->get();
                }
                elseif($request->session != 'null'){
                    // return 'session';
                        $items = StudentProfile::with('studentBatches','courses','studentSession')->where('session',$request->session)
                        ->orderBy('batch')->get();
                }
                elseif($request->course != 'null'){
                    // return 'course';
                        $items = StudentProfile::with('studentBatches','courses','studentSession')
                        ->where('courseName',$request->course)
                        ->orderBy('batch')->get();
                }
                else{
                    $items = StudentProfile::with('studentBatches','courses','studentSession')
                    ->orderBy('batch')->get(); 
                }
            }
        }
        $sbatch = $request->batch;
        $ssession= $request->session;
        $scourse = $request->course;

        $sessions = StudentSession::all();
        $batches = StudentBatch::all();
        $courses = Course::all();
        $siteconf = SiteConfig::first();
        //  dd($items);
        // foreach($items as $item){
        //     $item['batch'] = $item['batch']?StudentProfile::findName($item['batch']):null;
        //     $item['session'] = $item['session']?StudentProfile::findName($item['session']):null;
        //     $item['bloodGroup'] = $item['bloodGroup']?StudentProfile::findName($item['bloodGroup']):null;
        // }   
        // dd($items);        
        return view('admin.studentProfile.index',compact('items','siteconf','sessions','batches','courses',
        'sbatch','ssession','scourse'));
    }

    public function index(){

        return view('admin.studentProfile.index');



        // $sbatch = 'null';
        // $ssession='null';
        // $scourse ='null';
        // $items = StudentProfile::with('studentBatches','courses','studentSession')
        //          ->orderBy('batch')->get();
        // $sessions = StudentSession::all();
        // $batches = StudentBatch::all();
        // $courses = Course::all();
        // $siteconf = SiteConfig::first();
        //  dd($items);
        // foreach($items as $item){
        //     $item['batch'] = $item['batch']?StudentProfile::findName($item['batch']):null;
        //     $item['session'] = $item['session']?StudentProfile::findName($item['session']):null;
        //     $item['bloodGroup'] = $item['bloodGroup']?StudentProfile::findName($item['bloodGroup']):null;
        // }   
        // dd($items);
        // return view('admin.studentProfile.index',compact('items','siteconf','sessions','batches','courses',
        // 'sbatch','ssession','scourse'));

        // return view('admin.studentProfile.index',compact('items','siteconf','sessions','batches','courses'));
    }

    public function create(){
        // $batches = StudentBatch::all();
        // $sessions = StudentSession::all();
        // $courses = Course::all();
        // $siteconf = SiteConfig::first();
        // $configurations = Configuration::all();
        // $count_student = StudentProfile::pluck('id')->count(); 
        //,compact('courses','batches','sessions','configurations','siteconf','count_student')
        return view('admin.studentProfile.create');
    }

    public function store(Request $request){  
        $this->validate($request,[
            'session'        => 'required',
            'batch'          => 'required',
            'courseName'      => 'required',
            'studentId'       => 'required|unique:student_profiles',
            'name'            => 'required',
            'fatherName'      => 'required',
            'motherName'      => 'required',
            'dob'             => 'nullable',
            'bloodGroup'      => 'required',
            'religion'        => 'required',
            'gender'          => 'required',
            'phoneNo'         => 'required|regex:/(01)[0-9]{9}/|max:11',
            'guardianPhoneNo' => 'nullable|regex:/(01)[0-9]{9}/|max:11',
            'email'           => 'nullable',
            'presentAddress'  => 'nullable',
            'parmanentAddress' => 'nullable',
            'body'          => 'nullable',
            'status'          => 'required',
            'image'         => 'mimes:jpeg,jpg,png|nullable'
        ]);
        $item = new StudentProfile();
        $image = $request->file('image');
        // dd($image);
        $slug = str_slug($request->name);
        //@dd($request->all());
        // $applyStudent = ApplyNow::findOrFail($request->apply_id);
        // dd($applyStudent);
        // dd($request->applyImage);
        if(!empty($request->applyImage)){
            $filename = $request->applyImage;
        }
        elseif ($request->hasFile('image')){
            $std_img = $request->image;
            $extension = $std_img->getClientOriginalExtension();
            $remove_space = str_replace(" ","",$request->name);
            $trim = $remove_space.time().str_random(5);
            $filename = $trim.".".$extension;
            $folderpath = 'uploads/studentprofile/';
            $image_url = $folderpath.$filename;
            $std_img->move($folderpath , $filename);
            $filename = $image_url; 
        }


        $item->session = $request->session;
        $item->batch = $request->batch;
        // $item->courseName = $request->courseName;
        $item->studentId = $request->studentId;
        $item->name = $request->name;
        $item->fatherName = $request->fatherName;
        $item->motherName = $request->motherName;
        $item->dob = $request->dob;
        $item->nid = $request->nid;
        $item->bloodGroup = $request->bloodGroup;
        $item->religion = $request->religion;
        $item->gender = $request->gender;
        $item->phoneNo = $request->phoneNo;
        $item->guardianPhoneNo = $request->guardianPhoneNo;
        $item->email = $request->email;
        $item->presentAddress = $request->presentAddress;
        $item->parmanentAddress = $request->parmanentAddress;
        $item->body = $request->body;
        $item->image = $filename??null;
        $item->courseName = $request->courseName;
        $item->status = $request->status;
        // dd($item);
        $item->save();
        
        // Delting apply now row
        if($request->apply_id) {
            $appliedInfo = ApplyNow::where('id', $request->apply_id)->delete();
        }
        return redirect()->route('studentProfile.index')->with('message','Student Successfully Added');
    }
 
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $item = StudentProfile::findOrFail($id);
         $configurations = Configuration::all();
         $siteconf = SiteConfig::first();

        $batches = StudentBatch::all();
        $sessions = StudentSession::all();
        $courses = Course::all();
        return view('admin.studentProfile.edit',compact('item','courses','sessions','batches','siteconf','configurations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//      return  $request->name;
//         @dd($request->all());
          $this->validate($request,[
           'session'    => 'required',
           'batch'      => 'required',
           'courseName'  => 'required',
           'studentId' => 'unique:student_profiles,studentId,'.$id,
           'name'        => 'required',
           'fatherName'   => 'required',
           'motherName'   => 'required',
           'dob'          => 'nullable',
           'nid'          => 'nullable',
           'bloodGroup'   => 'required',
           'religion'     => 'required',
           'gender'       => 'required',
           'phoneNo' => 'required|regex:/(01)[0-9]{9}/|max:11',
           'guardianPhoneNo' => 'nullable|regex:/(01)[0-9]{9}/|max:11',
           'email'         => 'nullable',
           'presentAddress' => 'nullable',
           'parmanentAddress' => 'nullable',
           'body'          => 'nullable',
           // 'image'         => 'mimes:jpeg,jpg,png|nullable'
           'image'    => 'nullable|mimes:jpeg,jpg,png',
       ]);
        
        $item = StudentProfile::find($id);
//             dd($item);
      $itemId = $item->id;

        if ($request->hasFile('image')) {
            //delete previous image
            $image_path = $item->image;  // Value is not URL but directory file path
            if(File::exists($image_path)) {
                // dd($image_path);
                File::delete($image_path);
            }
            $std_img = $request->image;
            $extension = $std_img->getClientOriginalExtension();
            $remove_space = str_replace(" ","",$request->name);
            $trim = $remove_space.time().str_random(5);
            $filename = $trim.".".$extension;
            $folderpath = 'uploads/studentprofile/';
            $image_url = $folderpath.$filename;
            $std_img->move($folderpath , $filename);
            $filename = $image_url; 
            $item->image = $filename;
        }

        $item->session = $request->session;
        $item->batch = $request->batch;
        $item->courseName = $request->courseName;
        $item->studentId = $request->studentId;
        $item->name = $request->name;
        $item->fatherName = $request->fatherName;
        $item->motherName = $request->motherName;
        $item->dob = $request->dob;
        $item->nid = $request->nid;
        $item->bloodGroup = $request->bloodGroup;
        $item->religion = $request->religion;
        $item->gender = $request->gender;
        $item->phoneNo = $request->phoneNo;
        $item->guardianPhoneNo = $request->guardianPhoneNo;
        $item->email = $request->email;
        $item->presentAddress = $request->presentAddress;
        $item->parmanentAddress = $request->parmanentAddress;
        $item->body = $request->body;   
        $item->courseName = $request->courseName;
        // $item->image = $imageName;
         // dd($item);
        $item->status = $request->status;
        $item->save();

         
        return redirect()->route('studentProfile.index')->with('message','Student Successfully Update');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($request->id);
        $item = StudentProfile::find($id);
        $item->delete();
        //delete image
        $image_path = "/uploads/studentprofile/".$item->image;  // Value is not URL but directory file path
        if(File::exists($image_path)) {
            // dd($image_path);
            File::delete($image_path);
        }
        $item = StudentProfile::get();
        // dd($item);
      return redirect()->route('studentProfile.index')->with('message','Student Successfully deleted');
        // return($request->id);
        // return redirect()->action('ContactController@showContactList');
    }
    // public function getStudentId(Request $request){
    //     if($request->sessionId > 0 && $request->batchId > 0 && $request->courseId > 0 ){
    //         $session_short_code = StudentSession::find($request->sessionId)->short_code;
    //         $batch_short_code = StudentBatch::find($request->batchId)->short_code;
    //         $course_short_code = Course::find($request->courseId)->short_code;
    //         //generate course id
    //         $studentBatch = StudentProfile::where('batch',$request->batchId)->get()->count();
    //         $studentCourse = StudentProfile::where('courseName',$request->courseId)->get()->count();
//            $student_id = $studentBatch;
//            return $studentBatch;
    //         $g_id = 0;
    //     if ($studentBatch == 0){
    //         $student_id = ($session_short_code.$batch_short_code.$course_short_code.$g_id)+1;
    //     }
    //     elseif($studentCourse == 0){
    //         $student_id = $session_short_code.$batch_short_code.$course_short_code.$g_id+1;
    //     }
    //     elseif($studentBatch > 0 && $studentCourse == 0){
    //         $student_id = $session_short_code.$batch_short_code.$course_short_code.$g_id+1;
    //     }
    //     elseif($studentBatch == 0 && $studentCourse > 0){
    //         $student_id = $session_short_code.$batch_short_code.$course_short_code.$g_id+1;
    //     }
    //     elseif($studentBatch > 0 && $studentCourse > 0) {
    //         $student_id = $session_short_code . $batch_short_code . $course_short_code . $studentBatch+1;
    //     }else{
    //       $student_id = 0;
    //     }
    //     return $student_id;

    // }
    // }
    //=========================Active Method=====================//
    public function active($id){
        $update = StudentProfile::where('id',$id)->update([
            'status' => 1
        ]);
        return redirect()->back()->with('success','Student Activated Successfully');
    }
    public function inactive($id){
        $update = StudentProfile::where('id',$id)->update([
            'status' => 0
        ]);
        return redirect()->back()->with('success','Student In-activated Successfully');
    }


    // storeStudent function
    public function storeStudent(Request $request)
    {
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
        $student->status= $request->status;
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

    //Get Student Using Ajax
    public function getStudent($course, $batch)
    {
        return StudentProfile::where([
            'course_id' => $course,
            'batch_id'  => $batch,
        ])->get();
    }
    //Approve Student
    public function approveStudent(Request $request, $id)
    {
        $student = StudentProfile::find($id);
        $student->status = $request->status;
        $student->save();
        //Sms Section
        $switc = SmsSwitch::getAllSwitch();
        $switch = $switc->student_approve_switch;
        if ($switch == 1) {
          $number = $student->phone;
          $message = Sms::first();
          $msg = $message->student_approved;
          $output = Sms::techno_bulk_sms($message, $msg);
        }
        dd($output);
        //Sms Section End
        return redirect()->route('home');
    }

    //Delete Student
    public function deleteStudent($id)
    {
        $student = StudentProfile::find($id);
        unlink(public_path('/uploads/studentprofile/'.$student->photo));
        $student->delete();
        return redirect()->route('home');
    }

    
}
