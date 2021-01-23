<?php

namespace App;

use App\Expense;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    public function expenses(){

    	return  $this->belongsToMany(Expense::class);
    
    }

    
}
