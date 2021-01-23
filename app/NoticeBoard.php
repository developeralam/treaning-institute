<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoticeBoard extends Model
{
    //Get All Notice Board
    public static function getAllNotice()
    {
    	return NoticeBoard::all();
    }
}
