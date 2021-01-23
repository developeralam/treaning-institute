<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Page;
use App\SiteConfig;
use Illuminate\Http\Request;

class PageController extends Controller
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
         $items  = Page::all();
         $siteconf = SiteConfig::first();
        return view('admin.page.index',compact('items','siteconf'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siteconf = SiteConfig::first();
        return view('admin.page.create',compact('siteconf'));
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
           'desc' => 'required',
          
       ]);
       
        $item = new Page();
        $item->name = $request->name;
        $item->desc = $request->desc;
        $item->save();
        return redirect()->route('page.index')->with('message','Page Successfully Added');
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
        $item = Page::findOrFail($id);
        $siteconf = SiteConfig::first();
        return view('admin.page.edit',compact('item','siteconf'));
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
            'name'  => 'required',
            'desc' => 'required',
           
        ]);
        
         $item = Page::find($id);
         $item->name = $request->name;
         $item->desc = $request->desc;
         $item->save();
         return redirect()->route('page.index')->with('message','Page Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $item = Page::find($id);
        $item->delete();
         return redirect()->route('page.index')->with('message','Page Successfully Deleted');
    }
}
