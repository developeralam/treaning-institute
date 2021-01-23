<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteConfig extends Model
{
    //
	public static function getAllConfig()
	{
		return SiteConfig::first();
	}
}
