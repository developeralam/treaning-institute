<?php

namespace App\Http\Controllers\Admin;

use App\Party;
use App\Http\Controllers\Controller;
use App\SiteConfig;
use Illuminate\Http\Request;

class PartyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siteconf = SiteConfig::first();
        $items = Party::all();
        return view('admin.party.index',compact('items','siteconf'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siteconf = SiteConfig::first();
        return view('admin.party.create',compact('siteconf'));
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
            'email'    => 'nullable',
            'phone'    => 'nullable|max:11',
           
        ]);
        
         $item = new Party();
         $item->name = $request->name;
         $item->email = $request->email;
         $item->phone = $request->phone;
         $item->save();
         return redirect()->route('party.index')->with('message','Party Successfully Added');
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
        $siteconf = SiteConfig::first();
        $item = Party::findOrFail($id);
        return view('admin.party.edit',compact('item','siteconf'));
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
            'email'    => 'nullable',
            'phone'    => 'nullable|max:11',
           
        ]);
        
         $item = Party::find($id);
         $item->name = $request->name;
         $item->email = $request->email;
         $item->phone = $request->phone;
         $item->save();
         return redirect()->route('party.index')->with('message','Party Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Party::find($id);
        $item->delete();
        return redirect()->route('party.index')->with('message','Party Successfully Deleted');
    }
}
