<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    
    //Get All Slider
    public static function getAllSlider()
    {
    	return Slider::all();
    }
}
