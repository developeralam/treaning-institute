<?php

namespace App\Http\Controllers;

use App\Menu;
use App\SiteConfig;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create() {
        return view('admin.menu.create',[
            'menus' => Menu::all(),
            'siteconf' => SiteConfig::first(),
        ]);
    }
    public function post(Request $request){
        $this->validate($request,[
            'menu' => 'required|max:11',
            'title' => 'required|max:190',
        ]);

        Menu::insert([
            'menuid'=>$request->menu,
            'title'=>$request->title,
            'description'=>$request->description,
        ]);
        return redirect()->route('createmenu', [
            'menus' => Menu::all(),
        ])->with('status','Done');
    }

    public function view() {
        return view('admin.menu.index',[
            'menus' => Menu::orderByRaw('menuid','ASC')->paginate(10),
            'siteconf' => SiteConfig::first(),
        ]);
    }

    public function update($id) {
        return view('admin.menu.update',[
            'menus' => Menu::all(),
            'item' => Menu::where('id',$id)->first(),
            'siteconf' => SiteConfig::first(),
        ]);
    }

    public function updatepost(Request $request){

        $this->validate($request,[
            'menu' => 'required|max:11',
            'title' => 'required|max:190',
        ]);

        Menu::findOrFail($request->id)->update([
            'menuid'=>$request->menu,
            'title'=>$request->title,
            'description'=>$request->description,
        ]);

        return redirect()->route('mview', [
            'menus' => Menu::all(),
        ])->with('status','Done');
    }

    public function delete($id) {

        if (Menu::where('menuid',$id)->get() != '[]') {
            return back()->with('msg','Warning ! Cannot Delete This has Sub Menu');
        }
        else
        {
            Menu::where('id',$id)->delete();
            return back()->with('status','Deleted');
        }

    }

}
