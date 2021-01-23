<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\ApplyNow;
use App\StudentBatch;
use App\StudentProfile;
use App\Course;
use App\Configuration;
use App\result;
use App\SiteConfig;
use App\StudentSession;
use Carbon\Carbon;
use File;
use illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use Illuminate\Support\Facades\Validator;

class ResultController extends Controller{


    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        return view('admin.result.index');
    }
    public function create()
    {
        return view('admin.result.create');
    }
    public function store(Request $request)
    {
        //Store Result
        foreach ($request->written as $key => $writen) {
            $result = new Result;
            $result->batch_id = $request->batch_id;
            $result->student_id = $request->student_id[$key];
            $result->written = $request->written[$key];
            $result->practical = $request->practical[$key];
            $result->viva = $request->viva[$key];
            $result->total = $request->total[$key];
            $result->gpa = $request->gpa[$key];
            $result->save();
        }
            return back();

    }
    public function getstufrresult($id)
    {
        return StudentProfile::where('batch_id', $id)->get();
    }
    public function getResult($id)
    {
        return Result::where('batch_id', $id)->get();
    }
    public function destroy($id){

        // return $id;
        $delete = result::where('id', $id)->delete();
        if ($delete) {
            return back()->with('status', 'Success');
        } else {
            return back()->with('warning', 'Not Updated');
        } 

    }

}
