<?php

namespace App\Transactions;

use App\Transactions\StudentChart;
use Illuminate\Database\Eloquent\Model;

class StudentPayment extends Model
{
	protected $guarded = ['id'];

	public function charts()
	{
		return $this->hasMany(StudentChart::class);
	}
}
