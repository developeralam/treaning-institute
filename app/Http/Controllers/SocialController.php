<?php

namespace App\Http\Controllers;

use App\Social;
use App\SiteConfig;
use Illuminate\Http\Request;
use Symfony\Polyfill\Iconv\Iconv;

class SocialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view() {
        return view('admin.social.index',[
            'icons'=>Social::orderby('id')->paginate(25),
            'siteconf' => SiteConfig::first(),
        ]);
    }

    public function create() {
        return view('admin.social.create',[
            'siteconf' => SiteConfig::first(),
        ]);
    }
    public function post(Request $request){

        $request->validate([
            'name' => 'required|max:190',
            'link' => 'required|max:190',
            'icon' => 'required|max:190',
            'color' => 'required|max:190',
            'status' => 'required',
        ]);
        
        social::insert([
            'name'=>$request->name,
            'link'=>$request->link,
            'icon'=>$request->icon,
            'color'=>$request->color,
            'status'=>$request->status,
        ]);
        return back()->with('status','Added Icon');
    }



    public function update($id) {
        return view('admin.social.update',[
            'item' => Social::where('id',$id)->first(),
            'siteconf' => SiteConfig::first(),
        ]);
    }

    public function updatepost(Request $request){

        // dd($request->status);
        $this->validate($request,[
            'name' => 'required|max:190',
            'link' => 'required|max:190',
            'icon' => 'required|max:190',
            'color' => 'required|max:190',
            'status' => 'required',
        ]);


        Social::findOrFail($request->id)->update([
            'name'=>$request->name,
            'link'=>$request->link,
            'icon'=>$request->icon,
            'color'=>$request->color,
            'status'=>$request->status,
        ]);

        return back()->with('status','Icon Updated');

    }

    public function delete($id) {
        Social::where('id',$id)->delete();
        return back()->with('status','Deleted');
    }
}
