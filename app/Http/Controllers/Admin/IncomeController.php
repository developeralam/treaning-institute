<?php
namespace App\Http\Controllers\Admin;
use App\Income;
use App\Account;
use App\Party;
use App\SiteConfig;
use App\IncomeChart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IncomeController extends Controller
{

    public function index()
    {
        $siteconf = SiteConfig::first();
        $items = Income::with('charts')->get();
        foreach($items as $item){
            $item['party_id'] = Income::findName($item['party_id']);
        }
        return view('admin.income.index',compact('items','siteconf'));
    }

    public function create()
    {
        // $accounts = Account::all();
        $siteconf = SiteConfig::first();
        $accounts = Account::
                    where('type','=','income') 
                    ->get();
        $parties = Party::all();
        return view('admin.income.create',compact('accounts','parties','siteconf'));
    }

    public function store(Request $request){

         $validateData = $request->validate([
            'party_id' => 'required|integer',
            'payment_date' => 'required',
            'type' => 'required|integer',
            'description' => 'required',
            'payable_amount' => 'required',
            'paid_amount' => 'required',
            'due_amount' => 'required',
         ]);

         $income = new Income;
         $income->party_id = $request->party_id;
         $income->payment_date = $request->payment_date;
         $income->type = $request->type;
         $income->description = $request->description;
         $income->payable_amount = $request->payable_amount;
         $income->paid_amount = $request->paid_amount;
         $income->due_amount = $request->due_amount;
         $income->status = 1;
         $income->save();
         return back();
    }

    public function income_view($id){
            $basicData = SiteConfig::first();
            $data = Income::find($id);
            $accountName = Account::find($data->type);
            $accountName=$accountName->name_of_account;
            return view('admin.income.income_view',compact('data','basicData','accountName'));
    }

    public function show($id){
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $item = Income::find($id);
        $item->delete();
        return redirect()->route('income.index')->with('message','Income Successfully Deleted');
    }
}
