<?php

namespace App;
use App\StudentPayment;
use App\Expense;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
	protected $table = "chart_of_accounts";
    public function studentPayments(){

    	return  $this->belongsToMany(StudentPayment::class);
    
    }
    public function expense(){

    	return  $this->belongsToMany(Expense::class);
    
    }
}
