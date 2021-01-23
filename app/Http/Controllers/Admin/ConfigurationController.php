<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\SiteConfig;
use App\Configuration;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
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

    public function batch()
    {
        $siteconf = SiteConfig::first();
        $items1 = Configuration::where('batch','1')->get();
        // @dd($items1);
         return view('admin.batch.index',compact('items1','siteconf'));
     }
     
     public function session() {   
        $siteconf = SiteConfig::first();
        $items2 = Configuration::where('session','1')->get();
         // @dd($items2);
        return view('admin.session.index',compact('items2','siteconf'));
       }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function batchForm()
    {
        $siteconf = SiteConfig::first();
        return view('admin.batch.create',compact('siteconf'));
    }

    public function sessionForm()
    {
        $siteconf = SiteConfig::first();
        return view('admin.session.create',compact('siteconf'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function batchStore(Request $request){
       // @dd($item);
         $this->validate($request,[
           'data'     => 'required',
          ]);
      
        $item = new Configuration();
        $item->data = $request->data;
        $item->batch = 1;
        $item->save();
         // @dd($item);
        return redirect()->route('batch.index')->with('message','Batch Successfully Added');

       }
         public function sessionStore(Request $request){
       // @dd($item);
         $this->validate($request,[
           'data'     => 'required',
          ]);
      
        $item = new Configuration();
        $item->data = $request->data;
        $item->session = 1;
        $item->save();
         // @dd($item);
        return redirect()->route('session.index')->with('message','Session Successfully Added');
       }
       public function batchEditForm($id) {

            $siteconf = SiteConfig::first();     
             $item = Configuration::findOrFail($id);
             return view('admin.batch.edit',compact('item','siteconf'));
       }
       public function sessionEditForm($id) {
             
             $siteconf = SiteConfig::first(); 
             $item = Configuration::findOrFail($id);
             return view('admin.session.edit',compact('item','siteconf'));
       }
       public function batchUpdate(Request $request, $id){
        
        $this->validate($request,[
           'data'     => 'required',
          ]);
      
        $item = Configuration::find($id);
        $item->data = $request->data;
        $item->batch = 1;
        $item->save();
         // @dd($item);
        return redirect()->route('batch.index')->with('message','Batch Successfully Update');
       }
        public function sessionUpdate(Request $request, $id){
        
        $this->validate($request,[
           'data'     => 'required',
          ]);
      
        $item = Configuration::find($id);
        $item->data = $request->data;
        $item->session = 1;
        $item->save();
         // @dd($item);
        return redirect()->route('session.index')->with('message','Session Successfully Update');
       }
       public function batchDelete($id){
        
             $item = Configuration::find($id);
             $item->delete();
             // @dd($item);
        return redirect()->route('batch.index')->with('message','Batch Successfully Deleted');
       }     
         public function sessionDelete($id){
        
             $item = Configuration::find($id);
             $item->delete();
             // @dd($item);
        return redirect()->route('session.index')->with('message','Session Successfully Deleted');
       }
       
     
     // public function sessionStore(Request $request){
     //   // @dd($item);
     //     $this->validate($request,[
     //       'data'     => 'required',
     //      ]);
      
     //    $item = new Configuration();
     //    $item->data = $request->data;
     //    $item->batch = 1;
     //    $item->save();
     //     // @dd($item);
     //    return redirect()->route('admin.batch.index')->with('successMsg','Batch Successfully Added');
     //   }

    // public function store(Request $request)
    // {
    //     $this->validate($request,[
    //        'data'     => 'required',
           
          
    //    ]);
       
    //     $item = new Configuration();
    //     $item->data = $request->data;
    //     $item->save();
    //     return redirect()->route('batch.index')->with('successMsg','Page Successfully Added');
    // }

    // public function show($id)
    // {
    //     //
    // }

    // public function edit($id)
    // {
    //     //
    // }

    // public function update(Request $request, $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //    //
    // }
}
