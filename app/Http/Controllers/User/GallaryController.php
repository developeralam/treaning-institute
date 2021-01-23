<?php

namespace App\Http\Controllers\User;

use App\PhotoGallary;
use App\VedioGallary;
use App\Course;
use App\SiteConfig;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GallaryController extends Controller
{
     public function photo(){
        return view('user.gallary.photoIndex');
     }
     public function vedio(){
     	return view('user.gallary.vedioIndex');
     }
}
