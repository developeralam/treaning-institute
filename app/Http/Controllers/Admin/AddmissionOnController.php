<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\AddmissionOn;
use App\SiteConfig;
use Carbon\Carbon;
use File;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class AddmissionOnController extends Controller
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
        $siteconf = SiteConfig::first();
        $items = AddmissionOn::all();
        return view('admin.addmissionOn.index',compact('items','siteconf'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siteconf = SiteConfig::first();
        return view('admin.addmissionOn.create',compact('siteconf'));
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
           
           'slug' => 'required',
           // 'image'     => 'mimes:jpeg,jpg,png|required|dimensions:min_width=510,min_height=382'
           'image'     => 'mimes:jpeg,jpg,png|required'
       ]);
     $image = $request->file('image');
     $slug = str_slug($request->slug);
        if(null!==($image)){
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
        if(!file_exists('uploads/addmissionOn')){
            mkdir('uploads/addmissionOn',0777,true);
        }
        $image->move('uploads/addmissionOn',$imageName);
        } else {
            $imageName =  ('no');
        }

        $item = new AddmissionOn();
        
        $item->slug = $request->slug;
        $item->image = $imageName;
        $item->save();
        return redirect()->route('addmissionOn.index')->with('message','Addmission On Successfully Added');
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
        $siteconf = SiteConfig::first();
        $items = AddmissionOn::findOrFail($id);
        return view('admin.addmissionOn.edit',compact('items','siteconf'));
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
            
            'slug' => 'required',
            // 'image'     => 'mimes:jpeg,jpg,png|nullable|dimensions:min_width=510,min_height=382',
            'image'     => 'mimes:jpeg,jpg,png|nullable',
        ]);
     

         $item = AddmissionOn::find($id);
        // if(Input::hasFile('image'))
            if($request->file('image'))
    {
        $usersImage = public_path("uploads/addmissionOn/{$item->image}"); // get previous image from folder
        if (file::exists($usersImage)) { // unlink or remove previous image from folder
            unlink($usersImage);
        }
        // $image = Request::file('image');
         $image = $request->file('image');
        $imageName = time() . '-' . $image->getClientOriginalName();
        $image = $image->move(('uploads/addmissionOn'), $imageName);
        $item->image= $imageName;
    }

        
         $item->slug = $request->slug;
         $item->save();
         return redirect()->route('addmissionOn.index')->with('message','Addmission On Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = AddmissionOn::find($id);
        $item->delete();

        //delete image
        $image_path = "uploads/addmissionOn/".$item->image;  // Value is not URL but directory file path
        if(File::exists($image_path)) {
            // dd($image_path);
            File::delete($image_path);
        }

        $item = AddmissionOn::get();
        return redirect()->route('addmissionOn.index')->with('message','Addmission On Successfully Deleted');
    }
}
