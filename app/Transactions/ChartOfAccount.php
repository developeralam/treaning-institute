<?php

namespace App\Transactions;

use Illuminate\Database\Eloquent\Model;

class ChartOfAccount extends Model
{
	protected $fillable = [
		'name', 'type'
	];    
}
