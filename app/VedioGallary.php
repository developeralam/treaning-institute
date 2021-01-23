<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VedioGallary extends Model
{
    //Get All Video Gallery
    public static function getAllVideo()
    {
    	return VedioGallary::all();
    }
}
