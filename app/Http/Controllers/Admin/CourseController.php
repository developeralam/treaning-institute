<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Course;
use App\StudentProfile;
use App\SiteConfig;
use Illuminate\Http\Request;
use Carbon\Carbon;
use File;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $siteconf = SiteConfig::first();
        $items  = Course::all();
        return view('admin.course.index',compact('items','siteconf'));
    }
    public function create()
    {
        $siteconf = SiteConfig::first();
        // $Students = StudentProfile::all();
        return view('admin.course.create',compact('siteconf'));
    }
    public function store(Request $request)
    {
//        dd($request->all());
        $this->validate($request,[
           'title'        => 'required',
           'short_code'   => 'required|unique:courses',
           'desc'         => 'required',
           'duration'     => 'required',
           'fees'         => 'nullable',
            'day'         => 'required',
            'hour'         => 'required',
           'image'        => 'mimes:jpeg,jpg,png'
//           'image'        => 'mimes:jpeg,jpg,png|nullable|dimensions:max_width=510,max_height=382'
       ]);

          $image = $request->file('image');
          $slug = str_slug($request->title);
        if(!empty($image)){
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
        if(!file_exists('uploads/course')){
            mkdir('uploads/course',0777,true);
        }
        $image->move('uploads/course',$imageName);

        } else {
           // $imageName =  ('../no.png');
            $imageName =  ('no');
        }
        $item = new Course();
        $item->title = $request->title;
        $item->short_code = $request->short_code;
        $item->desc = $request->desc;
        $item->duration = $request->duration;
        $item->fees = $request->fees;
        $item->image = $imageName;
        $item->day = $request->day;
        $item->hour = $request->hour;
        $item->save();
         // @dd($item);
        return redirect()->route('course.index')->with('message','Course Successfully Added');
    }
    public function edit($id)
    {
        $item = Course::findOrFail($id);
        $siteconf = SiteConfig::first();
        $Students = StudentProfile::all();
        return view('admin.course.edit',compact('item','Students','siteconf'));
    }


    public function update(Request $request, $id)
    {

         $this->validate($request,[
            'title'           => 'required',
            'short_code'      => 'unique:courses,short_code,'.$id,
            'desc'            => 'required',
            'duration'        => 'required',
           'fees'             => 'nullable',
            'image'           => 'mimes:jpeg,jpg,png',
             'day'         => 'required',
             'hour'         => 'required',
//            'image'           => 'mimes:jpeg,jpg,png|nullable|dimensions:max_width=510,max_height=382',
        ]);
         $item = Course::find($id);
        // if(Input::hasFile('image'))
            if($request->file('image'))
    {
        $usersImage = public_path("uploads/course/{$item->image}"); // get previous image from folder
        if (file::exists($usersImage)) { // unlink or remove previous image from folder
            unlink($usersImage);
        }
        // $image = Request::file('image');
         $image = $request->file('image');
        $imageName = time() . '-' . $image->getClientOriginalName();
        $image = $image->move(('uploads/course'), $imageName);
        $item->image= $imageName;
    }

         // $item = Course::find($id);
         $item->title = $request->title;
         $item->short_code = $request->short_code;
         $item->desc = $request->desc;
         $item->duration = $request->duration;
         $item->fees = $request->fees;
        $item->day = $request->day;
        $item->hour = $request->hour;
         $item->save();
         return redirect()->route('course.index')->with('message','Course Successfully Updated');
    }
    public function destroy($id)
    {
        $item = Course::find($id);
        $item->delete();

        //delete image
        $image_path = "uploads/course/".$item->image;  // Value is not URL but directory file path
        if(File::exists($image_path)) {
            // dd($image_path);
            File::delete($image_path);
        }

        $item = Course::get();
        return redirect()->route('course.index')->with('message','Course Successfully  Deleted');
    }
}
