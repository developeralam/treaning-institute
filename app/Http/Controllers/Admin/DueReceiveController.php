<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\SiteConfig;
use App\StudentProfile;
use App\StudentPayment;
use App\StudentDue;
use App\Income;
use App\IncomeDue;
use App\ExpenceDue;
use App\Expense;
use App\Transactions\StudentChart;
use App\Transactions\Transaction;
use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;
class DueReceiveController extends Controller
{
    public function index(){
        $siteconf = SiteConfig::first();
        $students = StudentPayment::where('due_amount', '>', 0)->get();
        return view('admin.due_receive.due_receive',compact('siteconf', 'students'));
    }
    public function due_payment(Request $request){
        $validateData = $request->validate([
            'student_id' => 'required',
            'student_name' => 'required',
            'due_amount' => 'required',
            'pay_amount' => 'required',
        ]);
        $old = StudentPayment::where('student_id', $request->student_id)->first();

        $payment = new StudentDue;
        $payment->student_payment_id = $old->id;
        $payment->student_id = $old->student_id;
        //Get Current Date
        $mytime = Carbon::now();
        $mytime->toDateTimeString();
        $payment->payment_date = $mytime;
        $payment->due_amount = $request->due_amount;
        $payment->pay_amount = $request->pay_amount;
        $payment->status = $old->status;
        $payment->save();
        $old->due_amount = $old->due_amount - $request->pay_amount;
        $old->paid_amount = $old->paid_amount + $request->pay_amount;
        $old->save();
        return back();
        
    }
    //Show Income Due Page
    public function incomeDue()
    {
        $siteconf = SiteConfig::first();
        $incomes = Income::where('due_amount', '>', 0)->get();
        return view('admin.due_receive.income_due_receive',compact('siteconf', 'incomes'));
    }

    //Store Income Due Data
    public function storeIncomeDue(Request $request)
    {
        $old = Income::find($request->income_id);
        $income = new IncomeDue;
        $income->income_payment_id = $request->income_id;
        $income->due_amount = $request->due_amount;
        $income->pay_amount = $request->pay_amount;
        //Get Current Time
        $mytime = Carbon::now();
        $mytime->toDateTimeString();
        $income->payment_date = $mytime;
        $income->status = 1;
        $income->save();
        $old->due_amount = $old->due_amount - $request->pay_amount;
        $old->paid_amount = $old->paid_amount + $request->pay_amount;
        $old->save();
        return back();

    }

    //Show Expence Due Page
    public function expenceDue()
    {
        $siteconf = SiteConfig::first();
        $expences = Expense::where('due_amount', '>', 0)->get();
        return view('admin.due_receive.expence_due_receive',compact('siteconf', 'expences'));
    }

    //Store Expence Due Data
    public function storeExpenceDue(Request $request)
    {
        $old = Expense::find($request->income_id);
        $expence = new ExpenceDue;
        $expence->expence_payment_id = $request->income_id;
        $expence->due_amount = $request->due_amount;
        $expence->pay_amount = $request->pay_amount;
        //Get Current Time
        $mytime = Carbon::now();
        $mytime->toDateTimeString();
        $expence->payment_date = $mytime;
        $expence->status = 1;
        $expence->save();
        $old->due_amount = $old->due_amount - $request->pay_amount;
        $old->paid_amount = $old->paid_amount + $request->pay_amount;
        $old->save();
        return back();

    }

    public function expenceDueList()
    {
        $basicData = SiteConfig::first();
        $expences = ExpenceDue::all();
        return view('admin.due_receive.expencelist', compact('basicData', 'expences'));
    }
    public function studentDueList()
    {
        $basicData = SiteConfig::first();
        $students = StudentDue::all();
        return view('admin.due_receive.studentlist', compact('basicData', 'students'));
    }
    public function incomeduelist()
    {
        $basicData = SiteConfig::first();
        $incomes = IncomeDue::all();
        return view('admin.due_receive.incomelist', compact('basicData', 'incomes'));
    }

    
}
