<?php

namespace App\Transactions;

use App\StudentPayment;
use App\Transactions\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class StudentChart extends Model
{
   protected $fillable = [
		'chart_of_account_id', 'student_payment_id', 'description', 'amount',
	];

	public function studentPayment()
	{
		return $this->belongsTo(StudentPayment::class);
	}

	public function payment()
	{
		return $this->morphMany(Transaction::class, 'transactionable');
	}

	public function payments(){
		return $this->morphOne(Transaction::class, 'transactionable')
            ->where('created_at','=',$this->studentPayment->created_at)
			->selectRaw('sum(amount) as amount, transactionable_type')
			->groupBy('transactionable_type');
	}

	public function getPaidAttribute(){
		
		return Arr::get($this->payments, 'amount', 0);
	}

	public function getDueAttribute()
	{
		return $this->amount - $this->paid;
	}

}