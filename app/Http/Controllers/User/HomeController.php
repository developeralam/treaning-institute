<?php

namespace App\Http\Controllers\User;

use App\Slider;
use App\AboutUs;
use App\SuccessStu;
use App\AddmissionOn;
use App\SiteConfig;
use App\NewsUpdate;
use App\NoticeBoard;
use App\Course;
use App\Service;
use App\Message;
use App\Portfolio;
use App\Http\Controllers\Controller;
use App\StudentBatch;
use App\StudentSession;
use App\result;
use App\StudentProfile;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    // live = api.schoolsoftware-bd.com;
  // local = 127.0.0.1:8888
    
    
      public function index(){
              
       // dd($divisions->data);

         $aboutUs = AboutUs::first();
         $successStudents = SuccessStu::get();
         // @dd($successStudent);
         $addmissionOns = AddmissionOn::get();
          // @dd($addmissionOns);
         $siteConfig = SiteConfig::get()->first();
            // @dd($siteConfig);
         $newsUpdate = NewsUpdate::get();
          // @dd($newsUpdate);
         $sliders = Slider::get();
         $message = Message::get()->first();
         $course = Course::get();
         // $service = Service::get();
         $service = Service::orderBy('rank','asc')->take(7)->get();
         // $noticeBoard = NoticeBoard::get();
         $noticeBoard = NoticeBoard::orderBy('id','desc')->take(5)->get();

        //  Banner Api

         $client = new Client([
          'base_uri' => 'https://'.$this->host.'/',
        ]);

        $banner = $client->request('GET', "api/api-banner-get");
        $api_banner =  collect(json_decode($banner->getBody()));
        return view('user.home',compact('aboutUs','successStudents','addmissionOns','newsUpdate','siteConfig','sliders','message','course','service','noticeBoard','api_banner'));
     }
      public function aboutUs(){
           
            return view('user.aboutUs');
      }

      public function noticeBoardDetails($id){
             $item = NoticeBoard::findOrFail($id);
             return view('user.noticeBoardDetails',compact('item'));
      }

      public function Portfolio(){
            $items = Portfolio::get();
            $siteConfig = SiteConfig::get()->first();
            $course = Course::get();
            // @dd($items);
            return view('user.portfolio',compact('items','course','siteConfig'));
      }   

      public function divisionData(){
            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', 'https://'.$this->host.'/api/division');

            echo $response->getStatusCode(); # 200
            echo $response->getHeaderLine('content-type'); # 'application/json; charset=utf8'
            echo $response->getBody(); # '{"id": 1420053, "name": "guzzle", ...}'
      }       
      public function districtData(Request $request){
          $client = new Client([
            'base_uri' => 'https://'.$this->host.'/api/',
          ]);

          // dd($request->all());

          if ($request->filled('division_id')) {

              $districts =  $client->request('GET', "division/{$request->division_id}/district");
               // $districts;

           return response()->json(json_decode($districts->getBody()));
          }
      }

      public function banner(Request $request){
        $client = new Client([
          'base_uri' => 'https://'.$this->host.'/',
        ]);

        $banner = $client->request('GET', "api/api-banner-get");

        $api_banner =  response()->json(json_decode($banner->getBody()));

        return view('user.home',compact('api_banner'));
      }

      public function upazilaData(Request $request){
          $client = new Client([
            'base_uri' => 'https://'.$this->host.'/api/',
          ]);

        
          if ($request->filled('district_id')) {

              $upazila =  $client->request('GET', "division/{$request->district_id}/upazila");
               // $upazila;

           return response()->json(json_decode($upazila->getBody()));
          }
      }

      public function instituteData(Request $request){
          $client = new Client([
            'base_uri' => 'https://'.$this->host.'/api/',
          ]);

          if ($request->filled('upazila_id')) {

              $institute =  $client->request('GET', "division/{$request->upazila_id}/institute");
              

           return response()->json(json_decode($institute->getBody()));
          }
    }

    public function result(){
      $profile = '';
      $siteConfig = SiteConfig::first();
      return view('user.result',compact('siteConfig', 'profile'));
    }
    public function resultsearch(Request $request){
      $siteConfig = SiteConfig::first();


      $result = result::where('student_id', $request->search)->first();
      if ($result == '') {
        return back()->with('warning','No Result Found');        
      }
      else{
        $profile = StudentProfile::where('id', $result->s_id)
                    ->with('studentBatches', 'courses', 'studentSession')
                    ->first();
          // @dd($profile->toArray());
        return view('user.result', compact('siteConfig', 'result', 'profile'));
      }      
    }


    


}
