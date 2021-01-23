<?php

namespace App\Http\Controllers\User;

use App\Service;
use App\SiteConfig;
use App\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){

    	$items = Service::orderBy('rank','asc')->paginate(15);
    	$course = Course::get();
    	$siteConfig = SiteConfig::get()->first();
    	return view('user.service.index',compact('items','siteConfig','course'));
    }
}
