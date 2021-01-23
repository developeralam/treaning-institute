<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected  $guarded=[''];

    //Get All Service
    public static function getAllService()
    {
    	return Service::limit(6)->get();
    }
    public static function getAllServic()
    {
    	return Service::all();
    }
}
