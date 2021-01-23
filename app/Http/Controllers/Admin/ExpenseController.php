<?php

namespace App\Http\Controllers\Admin;

use App\Party;
use App\Expense;
use App\ExpenseChart;
use App\SiteConfig;
use App\Account;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ExpenseController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siteconf = SiteConfig::first();
        $items = Expense::all();

        foreach($items as $item)
        {
            $item['party_id'] = Expense::findName($item['party_id']);
          } 
        return view('admin.expense.index',compact('items','siteconf'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $siteconf = SiteConfig::first();
    $accounts = Account::where('type','=','expense')->get();
        $parties = Party::all();
        //  dd($parties);
        return view('admin.expense.create',compact('accounts','parties','siteconf'));
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
            'party_id' =>  'required|integer',
            'payment_date' => 'required',
            'type' => 'required|integer',
            'description' => 'required',
            'payable_amount' => 'required',
            'paid_amount' => 'required',
            'due_amount' => 'required',
        ]);

        $expense = new Expense;
        $expense->party_id = $request->party_id;
        $expense->payment_date = $request->payment_date;
        $expense->type = $request->type;
        $expense->description = $request->description;
        $expense->payable_amount = $request->payable_amount;
        $expense->paid_amount = $request->paid_amount;
        $expense->due_amount = $request->due_amount;
        $expense->status = 1;
        $expense->save();
        return back();
    }
    public function expense_view($id)
    {
        $siteconf = SiteConfig::first();
        $basicData = SiteConfig::first();
        $data = Expense::find($id);
        $accountName = Account::find($data->type);
        $accountName=$accountName->name_of_account;
        // dd($data);
        return view('admin.expense.expense_view',compact('data','basicData','siteconf', 'accountName'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect()->route('expense.index')->with('message','Expense Successfully deleted');
    }
}
