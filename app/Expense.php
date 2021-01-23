<?php

namespace App;

use App\Party;
use App\ExpenseChart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Expense extends Model
{

    public static function boot()
    {
        parent::boot();
        static::deleting(function($model){

            $model->charts->each->delete();
            foreach ($model->charts as $chart) {
                $chart->payment->each->delete();
            }
        });
    }
    protected $guarded = ['id'];
    //Get All Expence
    public static function getAllExpence()
    {
        return Expense::all();
    }
    public function party(){

    	return  $this->belongsTo(Party::class, 'party_id');
    
    }
    public function account(){

    	return  $this->belongsTo(Account::class);
    
    }
    public function charts()
    {
        return $this->hasMany(ExpenseChart::class);
    }
    public static function findName($id){
        return DB::table('parties')->select('name')->where('id',$id)->first()->name;
    }

    //Get Party Name For Expence Report
    public static function partyName($id)
    {
        $party = Party::find($id);
        return $party->name;
    }
    //Get Account Name For Expence Report
    public static function accountName($id)
    {
        $account = Account::find($id);
        return $account->name_of_account;
    }
    

 
}
