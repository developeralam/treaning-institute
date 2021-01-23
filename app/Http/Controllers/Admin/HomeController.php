<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Menu;
use App\SiteConfig;
use App\StudentProfile;
use App\StudentBatch;
use App\Course;
use App\ApplyNow; 
use App\Transactions\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
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

    public function index()
    {
        $siteconf = SiteConfig::first();
        $total_students = StudentProfile::where('status',1)->get()->count();
        $total_batches = StudentBatch::get()->count();
        $total_courses = Course::get()->count();
        $applied_student = ApplyNow::get()->count();
        $total_income = Transaction::
                        where('transactionable_type','App\Transactions\StudentChart')
                        ->orWhere('transactionable_type','App\IncomeChart')
                        ->sum('amount');
        $total_expense = Transaction::
                         where('transactionable_type','App\ExpenseChart')
                        ->sum('amount');
        return view('home',compact('siteconf','total_students','total_batches','total_courses','applied_student','total_income','total_expense'));
    }
}
