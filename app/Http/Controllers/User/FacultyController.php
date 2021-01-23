<?php

namespace App\Http\Controllers\User;

use App\Faculty;
use App\SiteConfig;
use App\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function index(){
      return view('user.faculty.faculty');
    }

    public function facultyDetails($id){
              
              $item = Faculty::findOrFail($id);
              $siteConfig = SiteConfig::get()->first();
              $course = Course::get();
              return view('user.faculty.facultyDetails',compact('item','siteConfig','course'));

    }
}
