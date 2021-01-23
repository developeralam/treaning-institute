<?php

namespace App\Http\Controllers\User;

use App\Menu;
use App\Message;
use App\Course;
use App\SiteConfig;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(){
    	$message = Message::first();
    	$siteConfig = SiteConfig::get()->first();
    	$course = Course::get();
    	return view('user.message',compact('message','siteConfig','course'));
    }
    public function page($id){
        return view('user.page',[
            'page' => Menu::where('id',$id)->first(),
            'siteConfig' => SiteConfig::first(),
        ]);
    }
}
