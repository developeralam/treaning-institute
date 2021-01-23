<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\SiteConfig;
use App\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{

    
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function($request, $next){
            if((AUTH::user()->role)!=2){
                return redirect('/admin/home')->with('error',"Your are not authorised");
            } else{
                return $next($request);
            }
        });
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.service.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $siteconf = SiteConfig::first();
         return view('admin.service.create',compact('siteconf'));
          
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
           'name'     => 'required',
           'weblink'     => 'required',
           'rank'     => 'required',
           'description' => 'required',
           'image'     => 'mimes:jpeg,jpg,png|nullable|dimensions:max_width=510,max_height=382',
       ]);

          $image = $request->file('image');
          $slug = str_slug($request->name);
        if(!empty($image)){
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
        if(!file_exists('uploads/service')){
            mkdir('uploads/service',0777,true);
        }
        $image->move('uploads/service',$imageName);

        } else {
           // $imageName =  ('../no.png');
            $imageName =  ('no');
        }
        
        $item = new Service();

        if ($item->rank < 0) {
            $rank = $request->rank * -1;
        }
        else{
            $rank = $request->rank;
        }
        $item->name = $request->name;
        $item->rank =  $rank;
        $item->weblink = $request->weblink;
        $item->description = $request->description;
        
        $item->image = $imageName;
        $item->save();
         // @dd($item);
        return redirect()->route('service.index')->with('message','Service Successfully Added');
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
        $item = Service::findOrFail($id);
         $siteconf = SiteConfig::first();
        return view('admin.service.edit',compact('item','siteconf'));
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
            'name'     => 'required',
            'weblink'     => 'required',
            'description' => 'required',
            
            'image'     => 'mimes:jpeg,jpg,png|nullable|dimensions:max_width=510,max_height=382',
        ]);
     

         $item = Service::find($id);
        // if(Input::hasFile('image'))
            if($request->file('image'))
    {
        $usersImage = public_path("uploads/service/{$item->image}"); // get previous image from folder
        if (file::exists($usersImage)) { // unlink or remove previous image from folder
            unlink($usersImage);
        }
        // $image = Request::file('image');
         $image = $request->file('image');
        $imageName = time() . '-' . $image->getClientOriginalName();
        $image = $image->move(('uploads/service'), $imageName);
        $item->image= $imageName;
    }


        if ($item->rank < 0) {
            $rank = $request->rank * -1;
        }
        else{
            $rank = $request->rank;
        }
        $item->name = $request->name;
        $item->rank =  $rank;
        $item->weblink = $request->weblink;
        $item->description = $request->description;
        $item->save();
        return redirect()->route('service.index')->with('message','Service Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $item = Service::find($id);
         $item->delete();

        //delete image
        $image_path = "uploads/service/".$item->image;  // Value is not URL but directory file path
        if(File::exists($image_path)) {
            // dd($image_path);
            File::delete($image_path);
        }

        $item = Service::get();
        return redirect()->route('service.index')->with('message','Service Successfully  Deleted');
    }
}
