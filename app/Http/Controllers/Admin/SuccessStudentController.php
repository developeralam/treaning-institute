<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\SuccessStu;
use App\SiteConfig;
use Carbon\Carbon;
use File;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class SuccessStudentController extends Controller
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
    public function index()
    {
        $items = SuccessStu::all();
        $siteconf = SiteConfig::first();
        return view('admin.successStudent.index',compact('items','siteconf'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siteconf = SiteConfig::first();
        return view('admin.successStudent.create',compact('siteconf'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
           'name'      => 'required',
           'post'      => 'required|max:25',
           'image'     => 'mimes:jpeg,jpg,png|nullable'
       ]);
     $image = $request->file('image');
     $slug = str_slug($request->name);
        if(null!==($image)){
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
        if(!file_exists('uploads/successstudent')){
            mkdir('uploads/successstudent',0777,true);
        }
        $image->move('uploads/successstudent',$imageName);
        } else {
            $imageName =  ('no');
        }

        $item = new SuccessStu();
        $item->name = $request->name;
        $item->post = $request->post;
        $item->image = $imageName;
        $item->save();
        return redirect()->route('successStudent.index')->with('message','Success Student  Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $items = SuccessStu::findOrFail($id);
        $siteconf = SiteConfig::first();
        return view('admin.successStudent.edit',compact('items','siteconf'));
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
         $this->validate($request,[
            'name'      => 'required',
            'post'      => 'required|max:25',
            'image'     => 'mimes:jpeg,jpg,png|nullable',
        ]);
     

         $item = SuccessStu::find($id);
        // if(Input::hasFile('image'))
            if($request->file('image'))
    {
        $usersImage = public_path("uploads/successstudent/{$item->image}"); // get previous image from folder
        if (file::exists($usersImage)) { // unlink or remove previous image from folder
            unlink($usersImage);
        }
        // $image = Request::file('image');
         $image = $request->file('image');
        $imageName = time() . '-' . $image->getClientOriginalName();
        $image = $image->move(('uploads/successstudent'), $imageName);
        $item->image= $imageName;
    }

         $item->name = $request->name;
         $item->post = $request->post;
         $item->save();
         return redirect()->route('successStudent.index')->with('message','Success Student  Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $item = SuccessStu::find($id);
        $item->delete();

        //delete image
        $image_path = "uploads/successstudent/".$item->image;  // Value is not URL but directory file path
        if(File::exists($image_path)) {
            // dd($image_path);
            File::delete($image_path);
        }

        $item = SuccessStu::get();
        return redirect()->route('successStudent.index')->with('message','Success Student  Deleted');
    }
}
