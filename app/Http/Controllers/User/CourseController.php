<?php

namespace App\Http\Controllers\User;

use App\Course;
use App\SiteConfig;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(){
    	$course_info = Course::paginate(15);
        $course = Course::get();
        // dd($name);
    	$siteConfig = SiteConfig::get()->first();
         return view('user.course',compact('siteConfig','course_info','course'));
    }
    public function courseDetails($id){
         $course = Course::findOrFail($id);
        return view('user.courseDetails',compact('course'));
    }
}
