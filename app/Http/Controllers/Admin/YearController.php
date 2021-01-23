<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Year;
use Illuminate\Http\Request;

class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.year.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.year.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'year' => 'required',
            'status_code' => 'required',
        ]);

        $year = new Year;
        $year->year = $request->year;
        $year->status_code = $request->status_code;
        $year->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Year  $year
     * @return \Illuminate\Http\Response
     */
    public function show(Year $year)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Year  $year
     * @return \Illuminate\Http\Response
     */
    public function edit(Year $year)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Year  $year
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $year = Year::find($id);
        $year->year = $request->year;
        $year->status_code = $request->status_code;
        $year->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Year  $year
     * @return \Illuminate\Http\Response
     */ 
    public function destroy($id)
    {
        $year = Year::find($id);
        $year->delete();
        return back();
    }
}
