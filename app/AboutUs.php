<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $fillable = [
        'title', 'about', 'link', 'image',
    ];

    //Get About us
	public static function getMessage()
	{
		return AboutUs::first();
	}
}
