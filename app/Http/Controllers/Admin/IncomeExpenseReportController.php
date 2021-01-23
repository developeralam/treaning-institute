<?php

namespace App\Http\Controllers\Admin;
use App\Account;
use App\Expense;
use App\ExpenseChart;
use App\Http\Controllers\Controller;
use App\Income;
use App\StudentPayment;
use App\StudentProfile;
use App\SiteConfig;
use App\Transactions\Transaction;
use DB;
use Illuminate\Http\Request;

class IncomeExpenseReportController extends Controller
{
    public function index(){ 
        $basicData = SiteConfig::first();
        $incomes = Income::all();
        $expences = Expense::all();
        return view('admin.report.income_expense_report',compact('basicData', 'incomes', 'expences'));
    }
    public function expenseReportIndex(){
        $basicData = SiteConfig::first();
        $expences = Expense::all();
        return view('admin.report.expense_report',compact('basicData', 'expences'));
    }
    public function expenseReport(Request $request)
    {
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $expenseData = Expense::with('party','charts')->whereBetween('date',[$from_date,$to_date])->get();
        // dd($expenseData);
        $basicData = SiteConfig::first();
        $f_date  = explode('-',$from_date);
        $ff_date = implode('/',$f_date);
        $t_date  = explode('-',$to_date);
        $tt_date = implode('/',$t_date);
        return view('admin.report.expense_report',compact('expenseData','basicData','ff_date','tt_date'));
    }
    public  function incomeExpenseReport(Request $request){
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $basicData = SiteConfig::first();

        $f_date  = explode('-',$from_date);
        $ff_date = implode('/',$f_date);
        $t_date  = explode('-',$to_date);
        $tt_date = implode('/',$t_date);
        $expenseData =  Transaction::where('transactionable_type','App\ExpenseChart')->whereBetween('created_at', [$from_date,$to_date])->get();
        $incomeData  =   Transaction::where('transactionable_type','App\IncomeChart')->whereBetween('created_at', [$from_date,$to_date])->get();
        $std_income  =   Transaction::where('transactionable_type','App\Transactions\StudentChart')->whereBetween('created_at', [$from_date,$to_date])->get();
        return view('admin.report.income_expense_report',compact('expenseData','incomeData','std_income','basicData','ff_date','tt_date'));
    }


    public function studentPaymentIndex(){  
        $basicData = SiteConfig::first();
        $payments = StudentPayment::all();
        return view('admin.report.student_payment',compact('basicData', 'payments'));

    }
    public function studentPaymentReport(Request $request)
    {
        $siteconf = SiteConfig::first();
        $from_date  = $request->from_date;
        $to_date    = $request->to_date;
        $basicData = SiteConfig::first();
        $std_income =   Transaction::where('transactionable_type','App\Transactions\StudentChart')->whereBetween('created_at', [$from_date,$to_date])->get();
        // dd($std_income);

        $f_date  = explode('-',$from_date);
        $ff_date = implode('/',$f_date);
        $t_date  = explode('-',$to_date);
        $tt_date = implode('/',$t_date);
        return view('admin.report.student_payment',compact('std_income','ff_date','tt_date','basicData','siteconf'));
    }

    public function incomeReportIndex()
    {  
        $basicData = SiteConfig::first(); 
        $incomes = Income::all();
        return view('admin.report.income_report',compact('basicData', 'incomes'));
    }
    public function incomeReport(Request $request)
    {
        $from_date = $request->from_date;
        $to_date   = $request->to_date;

        $basicData = SiteConfig::first();
        $incomeData = Income::with('party','charts')->whereBetween('date',[$from_date,$to_date])->get();
        // dd($incomeData);
        $f_date  = explode('-',$from_date);
        $ff_date = implode('/',$f_date);
        $t_date  = explode('-',$to_date);
        $tt_date = implode('/',$t_date);
        return view('admin.report.income_report',compact('incomeData','ff_date','tt_date','basicData'));
    }
}
