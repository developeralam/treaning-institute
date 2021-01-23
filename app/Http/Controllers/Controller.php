<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\SiteConfig;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    // public $host = 'api.schoolsoftware-bd.com';
    public $host = 'api.schoolsoftware-bd.com';
    public function __construct()
    {
        
        $data =  @file_get_contents('https://'.$this->host.'/api/division');
        $divisions  = json_decode($data); # '{"id": 1420053, "name": "guzzle", ...}'  
    	View::share('divisions', $divisions);
    }
}
