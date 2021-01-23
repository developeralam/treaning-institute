<?php

namespace App\Http\Controllers;

use App\SmsSwitch;
use Illuminate\Http\Request;

class SmsSwitchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $switch = new SmsSwitch;
        $switch->student_addmission_online_switch = $request->student_addmission_online_switch;
        $switch->student_addmission_manual_switch = $request->student_addmission_manual_switch;
        $switch->student_approve_switch = $request->student_approve_switch;
        $switch->student_fee_collection_switch = $request->student_fee_collection_switch;
        $switch->institute_income_switch = $request->institute_income_switch;
        $switch->institute_expence_switch = $request->institute_expence_switch;
        $switch->student_payment_due_switch = $request->student_payment_due_switch;
        $switch->income_payment_due_switch = $request->income_payment_due_switch;
        $switch->expence_payment_due_switch = $request->expence_payment_due_switch;
        $switch->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SmsSwitch  $smsSwitch
     * @return \Illuminate\Http\Response
     */
    public function show(SmsSwitch $smsSwitch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SmsSwitch  $smsSwitch
     * @return \Illuminate\Http\Response
     */
    public function edit(SmsSwitch $smsSwitch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SmsSwitch  $smsSwitch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SmsSwitch  $smsSwitch
     * @return \Illuminate\Http\Response
     */
    public function destroy(SmsSwitch $smsSwitch)
    {
        //
    }
}
