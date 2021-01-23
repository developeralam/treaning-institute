<?php

namespace App;

use App\Expense;
use App\Transactions\Transaction;
use Illuminate\Database\Eloquent\Model;

class ExpenseChart extends Model
{
    protected $fillable = [
		'chart_of_account_id', 'expense_id', 'description', 'amount',
    ]; 
    
    public function expense()
	  {
		  return $this->belongsTo(Expense::class);
    }

    public function payment()
    {
      return $this->morphMany(Transaction::class, 'transactionable');
    }
}
