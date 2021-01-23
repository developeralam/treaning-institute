<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SmsSwitch extends Model
{
	//Get All Sms
    public static function getAllSwitch()
    {
    	return SmsSwitch::first();
    }
}
