<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\SiteConfig;
use App\StudentBatch;
use Illuminate\Http\Request;
use App\Account;
use Session;

class AccountController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siteconf = SiteConfig::first();
        $accounts = Account::all();
        return view('admin.account.index',compact('accounts','siteconf'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siteconf = SiteConfig::first();
        return view('admin.account.create',compact('siteconf'));
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
            'name_of_account' => 'required',
            'type' => 'required',
        ]);
        $account = new Account();
        $account->name_of_account = $request->name_of_account;
        $account->type = $request->type;
        $account->save();
        if($account){
            Session::flash('success');
            return redirect()->back();
        }else{
            Session::flash('error');
            return redirect()->back();
        }
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
        $account = Account::findOrFail($id);
//        dd($account);
        return view('admin.account.edit',compact('account','siteconf'));
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
//        dd($request->all());
        $updateAccount = Account::
        where('id',$id)
            ->update([
                'name_of_account' => $request->name_of_account,
                'type' => $request->type,
            ]);
        if($updateAccount){
            Session::flash('success');
            return redirect()->back();
        }else{
            Session::flash('error');
            return redirect()->back();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $account = Account::find($id);
        $account->delete();
        return redirect()->back()->with('message','Chart of Account successfully Deleted');
    }
    
}
