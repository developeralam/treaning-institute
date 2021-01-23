<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\ApplyNow;
use App\StudentBatch;
use App\StudentProfile;
use App\SiteConfig;
use App\Course;
use App\Configuration;
use App\StudentSession;
use Illuminate\Http\Request;

class ApplyNowController extends Controller
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
    	$items = ApplyNow::with('courses')->get();
    	$siteconf = SiteConfig::first();
//        foreach($items as $item){
//        $item['course'] = ApplyNow::findName($item['course']);
//        }
        // @dd($items);
        // $courses = Course::get();
        // @dd($courses);
        return view('admin.applyNow.index',compact('items','siteconf'));
    }
    public function show($id){
    	$item = ApplyNow::find($id);
        $rel = Configuration::find($item->religion);   
        // if($rel){
        //     return $rel;
        // } else {
        //     return 'Religion not found';
        // }
        $bloodGrp = Configuration::find($item->bloodGroup);   
        $gender = Configuration::find($item->gender);   
         // @dd($rel->data);
         // @dd($bloodGrp->data);
         $siteconf = SiteConfig::first();
        // $courses = Course::get();
        // dd($item);
    	return view('admin.applyNow.show',compact('item','rel','siteconf','bloodGrp','gender'));
    }
    public function destroy($id){
        $item = ApplyNow::findOrFail($id);
        $item->delete();
        return redirect()->back();
    }
    //create a function which takes the id of the first table as a parameter
    public function approveStudent($id){
        $configurations = Configuration::all();
        $siteconf = SiteConfig::first();
        $courses = Course::all();
        $item = ApplyNow::where('id', $id)->first(); //this will select the row with the given id 
        $image = $item->image; 
        $sessions = StudentSession::get();
        $batches = StudentBatch::get();
        $courses = Course::get();
        return view('admin.studentProfile.approveStudent',compact('item','configurations','siteconf','courses','sessions','batches'));
    }

}
