<?php

namespace App;

use App\Income;
use App\Transactions\Transaction;
use Illuminate\Database\Eloquent\Model;

class IncomeChart extends Model
{
    protected $fillable = [
		'chart_of_account_id', 'income_id', 'description', 'amount',
    ]; 
    
    public function income()
	  {
		  return $this->belongsTo(Income::class);
    }

    public function payment()
    {
      return $this->morphMany(Transaction::class, 'transactionable');
    }
}
