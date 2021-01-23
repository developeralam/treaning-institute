<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\VedioGallary;
use App\SiteConfig;
use Carbon\Carbon;
use File;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class VedioGallaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $items = VedioGallary::all();
        $siteconf = SiteConfig::first();
        return view('admin.vedioGallary.index',compact('items','siteconf'));
    }
    public function create()
    {
        $siteconf = SiteConfig::first();
        return view('admin.vedioGallary.create',compact('siteconf'));
    }
    public function store(Request $request)
    {
        $item = new VedioGallary();
        $item->vedio = $request->youtube_link;
        $item->save();
        return redirect()->route('vedioGallary.index')->with('message','Vedio Gallary Successfully Added');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $item = VedioGallary::findOrFail($id);
        $siteconf = SiteConfig::first();
        return view('admin.vedioGallary.edit',compact('item','siteconf'));
    }
    public function update(Request $request, $id)
    {
        $item = VedioGallary::find($id);
        $item->vedio= $request->vedio;
        $item->save();
        return redirect()->route('vedioGallary.index')->with('message','Vedio Gallary Successfully Updated');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $item = VedioGallary::find($id);
        $item->delete();

        //delete image
        $image_path = "uploads/vediogallary/".$item->vedio;  // Value is not URL but directory file path
        if(File::exists($image_path)) {
            // dd($image_path);
            File::delete($image_path);
        }

        $item = VedioGallary::get();
        return redirect()->route('vedioGallary.index')->with('message','Vedio Gallary Successfully Deleted');
    }
}
