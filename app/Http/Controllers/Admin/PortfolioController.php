<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Portfolio;
use App\SiteConfig;
use Carbon\Carbon;
use File;
use Illuminate\Http\Request;

class PortfolioController extends Controller
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
        $items = Portfolio::all();
        return view('admin.portfolio.index',compact('items','siteconf'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $siteconf = SiteConfig::first();
        return view('admin.portfolio.create',compact('siteconf'));
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
           'title'     => 'required',
//           'description' => 'required|max:190',
           'description' => 'required',
           'image'     => 'mimes:jpeg,jpg,png|nullable|dimensions:max_width=510,max_height=382'
       ]);

          $image = $request->file('image');
          $slug = str_slug($request->title);
        if(!empty($image)){
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
        if(!file_exists('uploads/portfolio')){
            mkdir('uploads/portfolio',0777,true);
        }
        $image->move('uploads/portfolio',$imageName);

        } else {
           // $imageName =  ('../no.png');
            $imageName =  ('no');
        }
        
        $item = new Portfolio();

        $item->title = $request->title;
        $item->description = $request->description;
        $item->image = $imageName;
        $item->save();
         // @dd($item);
        return redirect()->route('portfolio.index')->with('message','Portfolio Successfully Added');
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
        $item = Portfolio::findOrFail($id);
         $siteconf = SiteConfig::first();
        return view('admin.portfolio.edit',compact('item','siteconf'));
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
            'title'     => 'required',
            'description' => 'required',
            'image'     => 'mimes:jpeg,jpg,png|nullable|dimensions:max_width=510,max_height=382',
        ]);
     

         $item = Portfolio::find($id);
        // if(Input::hasFile('image'))
            if($request->file('image'))
    {
        $usersImage = public_path("uploads/portfolio/{$item->image}"); // get previous image from folder
        if (file::exists($usersImage)) { // unlink or remove previous image from folder
            unlink($usersImage);
        }
        // $image = Request::file('image');
         $image = $request->file('image');
        $imageName = time() . '-' . $image->getClientOriginalName();
        $image = $image->move(('uploads/portfolio'), $imageName);
        $item->image= $imageName;
    }

         // $item = Course::find($id);
         $item->title = $request->title;
         $item->description = $request->description;
         $item->save();
         return redirect()->route('portfolio.index')->with('message','Portfolio Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $item = Portfolio::find($id);
         $item->delete();

        //delete image
        $image_path = "uploads/portfolio/".$item->image;  // Value is not URL but directory file path
        if(File::exists($image_path)) {
            // dd($image_path);
            File::delete($image_path);
        }

        $item = Portfolio::get();
        return redirect()->route('portfolio.index')->with('message','Portfolio Successfully  Deleted');
    }
}
