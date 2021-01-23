<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Faculty;
use Carbon\Carbon;
use App\SiteConfig;
use File;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class FacultyController extends Controller
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
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $siteconf = SiteConfig::first();
        $faculties = Faculty::all();
        return view('admin.faculty.index',compact('faculties','siteconf'));
    
    }
 
    public function create(){

        $siteconf = SiteConfig::first();
        return view('admin.faculty.create',compact('siteconf'));
    }

    public function store(Request $request){
         $this->validate($request,[
            'name'     => 'required',
            'designation' => 'required',
            'phone' => 'nullable|regex:/(01)[0-9]{9}/|max:11',
            'email' => 'required',
            'qualification' => 'nullable',
            'tranning' => 'nullable',
            'image'     => 'mimes:jpeg,jpg,png|dimensions:max_width=150,max_height=150|nullable'
       ]
    );
     $image = $request->file('image');
     $slug = str_slug($request->name);
        if(null!==($image)){
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
        if(!file_exists('uploads/faculty')){
            mkdir('uploads/faculty',0777,true);
        }
        $image->move('uploads/faculty',$imageName);
        } else {
           // $imageName =  ('../no.png');
            $imageName =  ('no');
        }
        $faculty = new Faculty();
        $faculty->name = $request->name;
        $faculty->designation = $request->designation;
        $faculty->phone = $request->phone;
        $faculty->email = $request->email;
        $faculty->qualification = $request->qualification;
        $faculty->tranning = $request->tranning;
        $faculty->image = $imageName;
        $faculty->save();
        return redirect()->route('faculty.index')->with('message','Faculty Successfully Added');
    }
 
    public function show($id){
        //
    }

    public function edit($id){
        $faculty = Faculty::findOrFail($id);
        $siteconf = SiteConfig::first();
        return view('admin.faculty.edit',compact('faculty','siteconf'));
    }


    public function update(Request $request, $id){         
           $this->validate($request,[
                'name'     => 'required',
                'designation' => 'required',
                'phone' => 'nullable|regex:/(01)[0-9]{9}/|max:11',
                'email' => 'required',
                'qualification' => 'nullable',
                'tranning' => 'nullable',
                'image'     => 'mimes:jpeg,jpg,png|dimensions:max_width=150,max_height=150|nullable'
        ]);
         $faculty = Faculty::find($id);
        // if(Input::hasFile('image'))
        if($request->file('image')){
            $usersImage = public_path("uploads/faculty/{$faculty->image}"); // get previous image from folder
            if (file::exists($usersImage)) { // unlink or remove previous image from folder
                unlink($usersImage);
            }
            // $image = Request::file('image');
            $image = $request->file('image');
            $imageName = time() . '-' . $image->getClientOriginalName();
            $image = $image->move(('uploads/faculty'), $imageName);
            $faculty->image= $imageName;
        }
        $faculty->name = $request->name;
        $faculty->designation = $request->designation;
        $faculty->phone = $request->phone;
        $faculty->email = $request->email;
        $faculty->qualification = $request->qualification;
        $faculty->tranning = $request->tranning;
        
         $faculty->save();
         return redirect()->route('faculty.index')->with('message','Faculty Successfully Updated');
    } 
    public function destroy($id){
        $faculty = Faculty::find($id);
        $faculty->delete();

        //delete image
        $image_path = "uploads/faculty/".$faculty->image;  // Value is not URL but directory file path
        if(File::exists($image_path)) {
            // dd($image_path);
            File::delete($image_path);
        }
        $faculty = Faculty::get();
        return redirect()->route('faculty.index')->with('message','Faculty Successfully Deleted');
    }
}
