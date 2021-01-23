<?php

namespace App\Http\Controllers\Admin;

use App\Sms;
use App\SmsSwitch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mobileNo= '01719115539';
        $message='Hi. This is MM IT SOFT LTD Agent Software. Developer Md alam. ';
        $output = Sms::techno_bulk_sms($mobileNo,$message);
        $switch = SmsSwitch::first();
        $sms = Sms::first();
        return view('admin.sms.index', compact('switch', 'sms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $content = Sms::first();
        $content->student_admission_online = $request->student_admission_online;
        $content->student_admission_manual = $request->student_admission_manual;
        $content->student_approved = $request->student_approved;
        $content->student_fee_collection = $request->student_fee_collection;
        $content->institute_income = $request->institute_income;
        $content->institute_expence = $request->institute_expence;
        $content->student_payment_due = $request->student_payment_due;
        $content->income_due = $request->income_due;
        $content->expence_due = $request->expence_due;
        $content->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sms  $sms
     * @return \Illuminate\Http\Response
     */
    public function show(Sms $sms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sms  $sms
     * @return \Illuminate\Http\Response
     */
    public function edit(Sms $sms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sms  $sms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sms $sms)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sms  $sms
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sms $sms)
    {
        //
    }
}
