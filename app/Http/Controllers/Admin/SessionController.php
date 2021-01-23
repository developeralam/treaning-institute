<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\SiteConfig;
use App\StudentSession;
use Illuminate\Http\Request;
use Session;
class SessionController extends Controller
{
    public function index(){
         $siteconf = SiteConfig::first();
        $sessions =  StudentSession::get();
        return view('admin.session.index',compact('sessions','siteconf'));
    }
    public function create(){
         $siteconf = SiteConfig::first();
        return view('admin.session.create','siteconf');
    }
    public function store(Request $request){
        $validation = $request->validate([
            'session_name' => 'required|unique:student_sessions',
            'short_code' => 'required|unique:student_sessions',
            'year_id' => 'required',
        ]);
        $session_store = $request->all();
        $store = StudentSession::create($session_store);
        if($store){
            Session::flash('success');
            return redirect()->back();
        }else{
            Session::flash('error');
            return redirect()->back();
        }
    }
    public function sessionUpdate(Request $request){
        $check = $request->validate([
            'session_name' => 'unique:student_sessions,session_name,'.$request->id,
            'short_code' => 'unique:student_sessions,short_code,'.$request->id,
        ]);
        $update_session = StudentSession::
                          where('id',$request->id)
                          ->update([
                              'session_name' => $request->session_name,
                              'short_code' => $request->short_code,
                          ]);
        if($update_session){
            Session::flash('success');
            return redirect()->back();
        }else{
            Session::flash('error');
            return redirect()->back();
        }
    }
    public function delete($id){
        $delete = StudentSession::where('id',$id)->delete();
        if($delete){
            Session::flash('success');
            return redirect()->back();
        }else{
            Session::flash('error');
            return redirect()->back();
        }
    }
}
