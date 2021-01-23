<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Message;
use App\SiteConfig;
use Carbon\Carbon;
use Illuminate\Support\Str;
use File;
use Illuminate\Http\Request;

class MessageController extends Controller
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
        // $items = Message::all();
        // $siteconf = SiteConfig::first();
        // return view('admin.message.index',compact('items','siteconf'));
    }

     public function showMessage(){
        $siteconf = SiteConfig::first();
        $items = Message::first();
         //dd($items);
        return view('admin.message',compact('items','siteconf'));
    }
    public function messagePost(Request $request){
         
          $this->validate($request,[
            'name' => 'required|max:190',
            'desc' => 'required',
            'by' => 'required|max:50',
//            'image' => 'nullable|mimes:jpg,jpeg,png,PNG|dimensions:max_width=204,max_height=201',
            'image' => 'nullable|mimes:jpg,jpeg,png,PNG',

         ]);
       // dd($request);exit;
         // $items = new AboutUs;
         $items = Message::first();
             if ($request->file('image')) {
                  $upload_image_name = "";

                  $image = $request->file('image');
                  $slug = Str::slug($request->title);


                  if (isset($image)) {
                  $imageName = $slug.'-'.uniqid().'.'.$image->getClientOriginalExtension();
                  $year = date('Y');
                  $month = date('m');
                  // $directory = './uploads/'.'aboutus/'.$year.'/'.$month.'/';
                  $directory = "uploads/message";

                  $image->move($directory, $imageName);
                   
                  $upload_image_name = $imageName;
                  }
                  $items->image = $upload_image_name;
             }
       
      
         $items->name = $request->name;
        $items->desc = $request->desc;
        $items->by = $request->by;
        // $items->image = $imageName;
         
        $items->save();
      // dd($request->all());
      return redirect()->route('message')->with('message','Message Successfully Updated');
     
    }

   
}
