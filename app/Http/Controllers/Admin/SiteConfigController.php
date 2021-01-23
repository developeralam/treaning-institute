<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\SiteConfig;
// use Carbon\Carbon;
use File;
// use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class SiteConfigController extends Controller
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
    // public function index()
    // {
    //         $items = SiteConfig::all();
    //         return view('admin.siteConfig.index',compact('items'));
    // }

    public function showSiteConfigurationForm(){
        $siteconf = SiteConfig::first();
        //dd($items);
        return view('admin.siteConf',compact('siteconf'));
    }

    public function siteConfigurationPost(Request $request){

        $this->validate($request,[
            'name' => 'required|max:190',
            // 'image' => 'image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=510,max_height=382|nullable',
            'image' => 'image|mimes:jpeg,png,jpg,gif,sv g',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'address' => 'required|max:190',
            'phone_number1' => 'required|max:11',
            // 'phone_number1' => 'required|regex:/(01)[0-9]{9}/|max:11',
            // 'phone_number2' => 'nullable|regex:/(01)[0-9]{9}/|max:11',
            'phone_number2' => 'nullable|max:11',
            'email'=>'required|max:190|email',
            'email2'=>'nullable|max:190|email',
            'faviconImage'=>'mimes:jpeg,png,jpg,gif,svg',
            'google_map' => 'nullable|max:600',
//            'about_us' => 'required|max:1200',
            'code' => 'nullable',
        ]);



        $siteconf = SiteConfig::first();
        // dd($siteconf);
        if ($request->hasFile('image')) {
            //delete previous image
            $image_path = "uploads/siteconfig/".$siteconf->image;  // Value is not URL but directory file path
            if(File::exists($image_path)) {
                // dd($image_path);
                File::delete($image_path);
            }

            $imageName = "companyLogo".'.'.$request->image->getClientOriginalExtension();
            // dd($imageName);
            $request->image->move(public_path('uploads/siteconfig/'), $imageName);
            $siteconf->image = $imageName;
        }

        if ($request->hasFile('faviconImage')) {
            //delete previous image
            $image_path = "uploads/siteconfig/".$siteconf->faviconImage;  // Value is not URL but directory file path
            if(File::exists($image_path)) {
                // dd($image_path);
                File::delete($image_path);
            }

            $imageName = "favicon".'.'.$request->faviconImage->getClientOriginalExtension();
            // dd($imageName);
            $request->faviconImage->move(public_path('uploads/siteconfig/'), $imageName);
            $siteconf->faviconImage = $imageName;
        }

        //Logo
        if ($request->hasFile('logo')) {
            //delete previous image
            $image_path = "uploads/siteconfig/".$siteconf->logo;  // Value is not URL but directory file path
            if(File::exists($image_path)) {
                // dd($image_path);
                File::delete($image_path);
            }

            $imageName = "logo".'.'.$request->logo->getClientOriginalExtension();
            // dd($imageName);
            $request->logo->move(public_path('uploads/siteconfig/'), $imageName);
            $siteconf->logo = $imageName;
        }

        // dd($siteconf);

        $siteconf->name = $request->name;
        $siteconf->address = $request->address;
        $siteconf->phone_number1 = $request->phone_number1;
        $siteconf->phone_number2 = $request->phone_number2;
        $siteconf->email = $request->email;
        $siteconf->email2 = $request->email2;
        $siteconf->facebook = $request->facebook;
        $siteconf->google_map = $request->google_map;
//        $siteconf->about_us = $request->about_us;
        $siteconf->code = $request->code;
        // $siteconf->short_about_us = $request->short_about_us;
        // @dd($siteconf);
        $siteconf->save();
        // dd($siteconf);
        // $request->session()->flash('successMsg', 'Information changed successfully!');
        return redirect()->route('siteConf')->with('message','Site Configuration Successfully Added');
        // return redirect()->route('admin.siteConf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('admin.siteConfig.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //      $this->validate($request,[
    //        'name'     => 'required',
    //        'phone' => 'required',
    //        'code' => 'required|max:20',
    //        'image'     => 'mimes:jpeg,jpg,png|nullable'
    //    ]);
    //  $image = $request->file('image');
    //  $slug = str_slug($request->name);
    //     if(null!==($image)){
    //         $currentDate = Carbon::now()->toDateString();
    //         $imageName = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
    //     if(!file_exists('uploads/siteconfig')){
    //         mkdir('uploads/siteconfig',0777,true);
    //     }
    //     $image->move('uploads/siteconfig',$imageName);
    //     } else {
    //         $imageName =  ('no');
    //     }

    //     $item = new SiteConfig();
    //     $item->name = $request->name;
    //     $item->phone = $request->phone;
    //     $item->code = $request->code;
    //     $item->image = $imageName;
    //     $item->save();
    //     return redirect()->route('siteConfig.index')->with('successMsg','Site Configuration Successfully Added');
    // }

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
    //  */
    // public function edit($id)
    // {
    //     $items = SiteConfig::findOrFail($id);
    //     return view('admin.siteConfig.edit',compact('items'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $this->validate($request,[
    //         'name'     => 'required',
    //         'phone' => 'required',
    //         'code' => 'required|max:20',
    //         'image'     => 'mimes:jpeg,jpg,png|nullable',
    //     ]);


    //      $item = SiteConfig::find($id);
    //     // if(Input::hasFile('image'))
    //         if($request->file('image'))
    // {
    //     $usersImage = public_path("uploads/siteconfig/{$item->image}"); // get previous image from folder
    //     if (file::exists($usersImage)) { // unlink or remove previous image from folder
    //         unlink($usersImage);
    //     }
    //     // $image = Request::file('image');
    //      $image = $request->file('image');
    //     $imageName = time() . '-' . $image->getClientOriginalName();
    //     $image = $image->move(('uploads/siteconfig'), $imageName);
    //     $item->image= $imageName;
    // }

    //      $item->name = $request->name;
    //      $item->phone = $request->phone;
    //      $item->code = $request->code;
    //      $item->save();
    //      return redirect()->route('siteConfig.index')->with('successMsg','Site Configuration Successfully Updated');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {

    //      $item = SiteConfig::find($id);
    //     $item->delete();

    //     //delete image
    //     $image_path = "uploads/siteconfig/".$item->image;  // Value is not URL but directory file path
    //     if(File::exists($image_path)) {
    //         // dd($image_path);
    //         File::delete($image_path);
    //     }

    //     $item = SiteConfig::get();
    //     return redirect()->route('siteConfig.index')->with('successMsg','Site Configuration Successfully Deleted');
    // }
}
