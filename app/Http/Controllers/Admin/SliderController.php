<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Slider;
use App\SiteConfig;
use Carbon\Carbon;
use File;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class SliderController extends Controller
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
        $sliders = Slider::all();
        $siteconf = SiteConfig::first();
        return view('admin.slider.index',compact('sliders','siteconf'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $siteconf = SiteConfig::first();
        return view('admin.slider.create',compact('siteconf'));
    }
 
    public function store(Request $request){

        $this->validate($request,[
           'title'     => 'nullable',
           'image'     => 'mimes:jpeg,jpg,png|dimensions:max_width=900,max_height=340|required',
       ]);
     $image = $request->file('image');
     $slug = str_slug($request->title);
        if(null!==($image)){
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
        if(!file_exists('uploads/slider')){
            mkdir('uploads/slider',0777,true);
        }
        $image->move('uploads/slider',$imageName);
        } else {
            $imageName =  ('no');
        }

        $slider = new Slider();
        $slider->title = $request->title;
        
        $slider->image = $imageName;
        $slider->save();
        return redirect()->route('slider.index')->with('message',"Slider Successfully Added");
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
 
    public function edit($id){
        $slider = Slider::findOrFail($id);
        $siteconf = SiteConfig::first();
        return view('admin.slider.edit',compact('slider','siteconf'));
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
            'title'     => 'nullable',
            'image'     => 'mimes:jpeg,jpg,png|dimensions:max_width=900,max_height=340|required',
        ]);
     
         $slider = Slider::find($id);
        // if(Input::hasFile('image'))
            if($request->file('image'))
    {
        $usersImage = public_path("uploads/slider/{$slider->image}"); // get previous image from folder
        if (file::exists($usersImage)) { // unlink or remove previous image from folder
            unlink($usersImage);
        }
        // $image = Request::file('image');
         $image = $request->file('image');
        $imageName = time() . '-' . $image->getClientOriginalName();
        $image = $image->move(('uploads/slider'), $imageName);
        $slider->image= $imageName;
    }

         $slider->title = $request->title;
       
         $slider->save();
         return redirect()->route('slider.index')->with('message','Slider Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $item = Slider::find($id);
        $item->delete();

        //delete image
        $image_path = "uploads/slider/".$item->image;  // Value is not URL but directory file path
        if(File::exists($image_path)) {
            // dd($image_path);
            File::delete($image_path);
        }

        $slider = Slider::get();
        return redirect()->route('slider.index')->with('message','Slider Successfully Deleted');
    }
}
