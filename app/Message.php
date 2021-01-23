<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    //Get All Message
    public static function getAllMessage()
    {
    	return Message::first();
    }
}
