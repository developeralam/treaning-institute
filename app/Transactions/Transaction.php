<?php

namespace App\Transactions;

use App\Transactions\StudentCharts;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
    	'id','transactionable_type','transactionable_id','amount','created_by','discount',
    ];
    protected $dateFormat = 'Y-m-d';

    public function transactionable()
    {
    	return $this->morphTo();
    }
}
