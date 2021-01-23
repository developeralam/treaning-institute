<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\StudentBatch;
use Session;
use App\SiteConfig;
class BatchController extends Controller
{

    public function batch()
    {
        $siteconf = SiteConfig::first();
        $batches = StudentBatch::get();
        return view('admin.batch.index',compact('batches','siteconf'));
    }

    public function store(Request $request){
        $validation = $request->validate([
            'batch_name' => 'required|unique:student_batches',
            'course_id' => 'required',
            'short_code' => 'required|unique:student_batches',
        ]);
        $batch_store = $request->all();
        $store = StudentBatch::create($batch_store);
        if($store){
            Session::flash('success');
            return redirect()->back();
        }else{
            Session::flash('error');
            return redirect()->back();
        }
    }
    public function batchUpdate(Request $request){
        $check = $request->validate([
            'batch_name' => 'unique:student_batches,batch_name,'.$request->id,
            'course_id' => 'required',
            'short_code' => 'unique:student_batches,short_code,'.$request->id,
        ]);

        $update_session = StudentBatch::
        where('id',$request->id)
            ->update([
                'batch_name' => $request->batch_name,
                'course_id' => $request->course_id,
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
        $delete = StudentBatch::where('id',$id)->delete();
        if($delete){
            Session::flash('success');
            return redirect()->back();
        }else{
            Session::flash('error');
            return redirect()->back();
        }
    }

    //Get Batch Ajax
    public function getBatch($id)
    {
        return StudentBatch::where('course_id', $id)->get();
    }
}
