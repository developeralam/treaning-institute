<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
	// public function myPage(){
    
 //        // $items = Faculty::where('item', '>', 5)->paginate(1);
 //        $items = Faculty::paginate(15);
 //        dd($items);

 //    }
	//Get All Teacher
	public static function getAllTeacher()
	{
		return Faculty::all();
	}
}
