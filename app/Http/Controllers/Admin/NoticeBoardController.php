<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\NoticeBoard;
use App\SiteConfig;
use Carbon\Carbon;
use File;
use Illuminate\Http\Request;

class NoticeBoardController extends Controller
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
 
    public function index(){
        $siteconf = SiteConfig::first();
        $items = NoticeBoard::all();
        return view('admin.noticeBoard.index',compact('items','siteconf'));
    }

    public function create(){
        $siteconf = SiteConfig::first();
        return view('admin.noticeBoard.create',compact('siteconf'));
    }

    public function store(Request $request){        
        $this->validate($request,[
        'title'     => 'required',
        'description' => 'required|max:700',
        'file'     => 'mimes:pdf|nullable',
        ]);
        $file = $request->file('file');
        $slug = str_slug($request->name);
        //        if(null!==($file)){
        //            $currentDate = Carbon::now()->toDateString();
        //            $fileName = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $file->getClientOriginalExtension();
        //        if(!file_exists('uploads/noticeboard')){
        //            mkdir('uploads/noticeboard',0777,true);
        //        }
        //        $file->move('uploads/noticeboard',$fileName);
        //        }
        if($request->hasFile('file')){
            $std_img = $request->file;
            $extension = $std_img->getClientOriginalExtension();
            $remove_space = str_replace(" ","",$request->title);
            $trim = $remove_space.time().str_random(5);
            $fileName = $trim.".".$extension;            
            if(!file_exists('uploads/noticeboard/')){
                mkdir('uploads/noticeboard/',0777,true);
            }
            $image_url = 'uploads/noticeboard/' . $fileName;
            $std_img->move('uploads/noticeboard/', $fileName);
            $filename = $image_url;
        }
        else {
            $fileName =  ('no');
        }

        $item = new NoticeBoard();
        $item->title = $request->title;
        $item->description = $request->description;
        $item->file = $fileName;
        $item->save();
        return redirect()->route('notice-board.index')->with('message','Notice Board Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        
        $siteconf = SiteConfig::first();
        $item = NoticeBoard::findOrFail($id);
        return view('admin.noticeBoard.edit',compact('item','siteconf'));
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
//        dd(strlen($request->description));
        $this->validate($request,[
            'title'     => 'required',
            'description' => 'required',
            'file'     => 'mimes:pdf|nullable',
        ]);
     
          
         $item = NoticeBoard::find($id);

        if($request->hasFile('file')){
            $std_img = $request->file;
            $extension = $std_img->getClientOriginalExtension();
            $remove_space = str_replace(" ","",$request->title);
            $trim = $remove_space.time().str_random(5);
            $fileName = $trim.".".$extension;
            
            $image_url = 'uploads/noticeboard/'.$fileName;
            $std_img->move('uploads/noticeboard/' , $fileName);
            $item->file = $image_url;
        }
         $item->title = $request->title;
         $item->description = $request->description;
         $item->save();
         return redirect()->route('notice-board.index')->with('message','Notice Board  Updated');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $item = NoticeBoard::find($id);
        $item->delete();
             // @dd($item->file);
        //delete image
        $image_path = "uploads/noticeboard/".$item->file;  // Value is not URL but directory file path
        if(File::exists($image_path)) {
            // dd($image_path);
            File::delete($image_path);
        }

        $item = NoticeBoard::get();
        return redirect()->route('notice-board.index')->with('message','Notice Board Successfully Deleted');
    }
}
