<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\NewsUpdate;
use App\SiteConfig;
use Carbon\Carbon;
use File;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class NewsUpdateController extends Controller
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
        $newsUpdates = NewsUpdate::all();
        $siteconf = SiteConfig::first();
        return view('admin.newsUpdate.index',compact('newsUpdates','siteconf'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $siteconf = SiteConfig::first();
        return view('admin.newsUpdate.create',compact('siteconf'));
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
           'title'     => 'required|max:100',
           'image'     => 'mimes:jpeg,jpg,png,pdf|dimensions:max_width=510,max_height=382|nullable',
           // 'fileUpload' => 'required|mimes:jpeg,png,jpg,zip,pdf|max:2048',
       ]);
     $image = $request->file('image');
     $slug = str_slug($request->title);
        if(null!==($image)){
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
        if(!file_exists('uploads/newsUpdate')){
            mkdir('uploads/newsUpdate',0777,true);
        }
        $image->move('uploads/newsUpdate',$imageName);
        } else {
            $imageName =  ('no');
        }

        $newsUpdate = new NewsUpdate();
        $newsUpdate->title = $request->title;
        $newsUpdate->image = $imageName;
        $newsUpdate->save();
        return redirect()->route('newsUpdate.index')->with('message','News & Update Successfully Added');
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
        $newsUpdate = NewsUpdate::findOrFail($id);
        $siteconf = SiteConfig::first();
        return view('admin.newsUpdate.edit',compact('newsUpdate','siteconf')); 
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
            'title'     => 'required|max:100',
            'image'     => 'mimes:jpeg,jpg,png,pdf|dimensions:max_width=510,max_height=382|nullable',
        ]);
     

         $newsUpdate = NewsUpdate::find($id);
        // if(Input::hasFile('image'))
            if($request->file('image'))
    {
        $usersImage = public_path("uploads/newsUpdate/{$newsUpdate->image}"); // get previous image from folder
        if (file::exists($usersImage)) { // unlink or remove previous image from folder
            unlink($usersImage);
        }
        // $image = Request::file('image');
         $image = $request->file('image');
        $imageName = time() . '-' . $image->getClientOriginalName();
        $image = $image->move(('uploads/newsUpdate'), $imageName);
        $newsUpdate->image= $imageName;
    }

         $newsUpdate->title = $request->title;
         $newsUpdate->save();
         return redirect()->route('newsUpdate.index')->with('message','News & Update Successfully Updated');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
         $newsUpdate = NewsUpdate::find($id);
        $newsUpdate->delete();

        //delete image
        $image_path = "uploads/newsUpdate/".$newsUpdate->image;  // Value is not URL but directory file path
        if(File::exists($image_path)) {
            // dd($image_path);
            File::delete($image_path);
        }

        $newsUpdate = NewsUpdate::get();
        return redirect()->route('newsUpdate.index')->with('message','News & Update Successfully Deleted');
    }
}
