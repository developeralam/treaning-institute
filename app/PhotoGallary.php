<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoGallary extends Model
{
    //Get All Photo
    public static function getAllPhoto()
    {
    	return PhotoGallary::all();
    }

}
