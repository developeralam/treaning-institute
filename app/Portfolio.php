<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    //Get All Portfolio
    public static function getAllPortfolio()
    {
    	return Portfolio::all();
    }
}
