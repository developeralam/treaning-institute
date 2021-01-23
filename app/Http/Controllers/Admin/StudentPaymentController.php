<?php

namespace App\Http\Controllers\Admin;

use App\StudentProfile;
use App\SiteConfig;
use App\Transactions\StudentChart;
use App\Transactions\Transaction;
use App\Configuration;
use App\Account;
use App\Course;
use App\Sms;
use App\SmsSwitch;
use App\StudentPayment;
use App\StudentBatch;
use App\StudentSession;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class StudentPaymentController extends Controller
{

    public function index(){
        $items = StudentPayment::all();
        $siteconf = SiteConfig::first();
        $accounts = Account::all();

        // dd($items->toArray());
        // $st_profile = StudentProfile::get();

        // $transactionData = Transaction::where('transactionable_type','App\Transactions\StudentChart')->get();

        // foreach ($transactionData as $value) {
        //   $data = Transaction::where('id',$value->transactionable_id)->first();
        //   dd($data);
        // }
        // foreach($items as $item){
        //    // $item['account_type'] = StudentPayment::findName($item['account_type']);
        //    $item['student_id'] = StudentPayment::findStudentName($item['student_id']);
        // }
        // return view('admin.studentPayment.index', compact('items','siteconf','accounts','st_profile'));
        return view('admin.studentPayment.index', compact('items','siteconf','accounts'));
    }
 
    public function create(){

         $siteconf = SiteConfig::first();
         $studentProfile = StudentProfile::whereStatus(1)->get();
         $configuration = Configuration::all();
         $accounts = Account::where('type','=','academic')->get();
         
        return view('admin.studentPayment.create',compact('studentProfile','configuration','accounts','siteconf'));
    } 

    public function ajaxGetBatch(Request $request){
        $id = $request->id;
        $student = StudentProfile::
                  whereStatus(1)
                  ->where('id', $id)
                  ->first();
        $batch   = StudentBatch::
                   where('id',$student->batch) 
                   ->get();
         $session = StudentSession::
                    where('id',$student->session)
                    ->get();
        return response()->json([
            'batch' => $batch,
            'session' => $session
        ]);
    } 
 
    public function store(Request $request){

        $validateData = $request->validate([
            'student_id' => 'required|integer',
            'type' => 'required|integer',
            'description' => 'required',
            'date' => 'required',
            'payable_amount' => 'required',
            'paid_amount' => 'required',
        ]);

        $payment = new StudentPayment;
        $payment->student_id = $request->student_id;
        $payment->date = $request->date;
        $payment->type = $request->type;
        $payment->description = $request->description;
        $payment->paybale_amount = $request->payable_amount;
        $payment->paid_amount = $request->paid_amount;
        $payment->due_amount = $request->due_amount;
        $payment->discount_amount = $request->discount_amount;
        $payment->status = 1;
        $payment->save();
        //Sms Section
        $switc = SmsSwitch::getAllSwitch();
        $switch = $switc->student_fee_collection_switch;
        if ($switch == 1) {
          $student = StudentProfile::find($request->student_id);
          $number = $student->phone;
          $message = Sms::first();
          $msg = $message->student_fee_collection;
          Sms::techno_bulk_sms($message, $msg);
        }
        //Sms Section End
        return back();

    }
    
    public function student_income($id){
        $basicData = SiteConfig::first(); 
        $data = StudentPayment::find($id);
        $student = StudentProfile::find($data->student_id);
        $course = Course::find($student->course_id);
        $accountName = Account::find($data->type);
        $accountName=$accountName->name_of_account;
        return view('admin.studentPayment.student_payment_view',compact('data','basicData', 'course', 'student', 'accountName'));
    }
 
    public function destroy(StudentPayment $studentPayment){
        $studentPayment->delete();
        return redirect()->route('student-payment.index')->with('message','Payment Successfully Deleted');
    }

     //------------------Search Medicine------------------//
    public function search_student(Request $request)
     {
       $data = StudentProfile::selectRaw('CONCAT(student_name," - ", studentId)as student_name, id')
                  ->whereStatus(1)
                  ->where('student_name','LIKE', '%'.$request->name.'%')
                  ->orWhere('student_id','LIKE', '%'.$request->name.'%')
                  ->take(10)
                  ->pluck('student_name', 'id'); 
          return response()->json($data);
    }

    //------------------Search Medicine------------------//
    public function student_search($id){
       $data = StudentProfile::
              whereStatus(1)
              ->where('id',$id)
              ->select('student_name','id')
              ->first(); 
          return response()->json($data);
    }
    //------------------Get Batch1------------------//
    public function getBatch($id)
    {
      return StudentBatch::where('course_id', $id)->get();
    }
    public function getstudent($id)
    {
      return StudentProfile::where('batch_id', $id)->get();
    }
}
