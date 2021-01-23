<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\PhotoGallary;
use Carbon\Carbon;
use App\SiteConfig;
use File;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class PhotoGallaryController extends Controller
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
        $items = PhotoGallary::all();
        $siteconf = SiteConfig::first();
        return view('admin.photoGallary.index',compact('items','siteconf'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siteconf = SiteConfig::first();
        return view('admin.photoGallary.create',compact('siteconf'));
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
            'image'     => 'mimes:jpeg,jpg,png,pdf|max:2048|dimensions:max_width=510,max_height=382|nullable'
         
       ]);
     $image = $request->file('image');
     // $slug = str_slug($request->title);
        if(null!==($image)){
            $currentDate = Carbon::now()->toDateString();
            $imageName = '-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
        if(!file_exists('uploads/photogallary')){
            mkdir('uploads/photogallary',0777,true);
        }
        $image->move('uploads/photogallary',$imageName);
        } else {
            $imageName =  ('no');
        }

        $item = new PhotoGallary();
         $item->image = $imageName;
        $item->save();
        return redirect()->route('photoGallary.index')->with('message','Photo Successfully Added');

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
        $item = PhotoGallary::findOrFail($id);
        $siteconf = SiteConfig::first();
        return view('admin.photoGallary.edit',compact('item','siteconf'));
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
            'image'     => 'mimes:jpeg,jpg,png,pdf|dimensions:max_width=510,max_height=382|nullable'
        ]);
     

         $item = PhotoGallary::find($id);
        // if(Input::hasFile('image'))
            if($request->file('image'))
    {
        $usersImage = public_path("uploads/photogallary/{$item->image}"); // get previous image from folder
        if (file::exists($usersImage)) { // unlink or remove previous image from folder
            unlink($usersImage);
        }
        // $image = Request::file('image');
         $image = $request->file('image');
        $imageName = time() . '-' . $image->getClientOriginalName();
        $image = $image->move(('uploads/photogallary'), $imageName);
        $item->image= $imageName;
    }

        
         $item->save();
         return redirect()->route('photoGallary.index')->with('message','Photo Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = PhotoGallary::find($id);
        $item->delete();

        //delete image
        $image_path = "uploads/photogallary/".$item->image;  // Value is not URL but directory file path
        if(File::exists($image_path)) {
            // dd($image_path);
            File::delete($image_path);
        }

        $item = PhotoGallary::get();
        return redirect()->route('photoGallary.index')->with('message','Photo Successfully Deleted');
    }
}
