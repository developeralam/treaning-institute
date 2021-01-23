<?php

namespace App;

use App\Party;
use App\IncomeChart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Income extends Model
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

    //Get All Income
    public static function getAllIncome()
    {
        return Income::all();
    }

    //Get type Name
    public function type()
    {
        return $this->belongsTo(IncomeChart::class, type);
    }

    public function party(){

    	return  $this->belongsTo(Party::class, 'party_id');
    
    }

    public function account(){

    	return  $this->belongsTo(Account::class);
    
    }

    public function charts()
    {
        return $this->hasMany(IncomeChart::class);
    }

    public static function findName($id){
        return DB::table('parties')->select('name')->where('id',$id)->first()->name;
    }
    //Get Party Name For Income Report
    public static function partyName($id)
    {
        $party = Party::find($id);
        return $party->name;
    }
    //Get Account Head For Income Report
    public static function accountHead($id)
    {
        $account = Account::find($id);
        return $account->name_of_account;
    }
}
