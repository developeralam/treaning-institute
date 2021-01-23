<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsUpdate extends Model
{
    //Get All News Update
    public static function newsUpdate()
    {
    	return NewsUpdate::first();
    }
}
