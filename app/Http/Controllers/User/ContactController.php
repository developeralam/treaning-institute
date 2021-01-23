<?php

namespace App\Http\Controllers\User;

use App\Contact;
use App\SiteConfig;
use App\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
  
     public function index(){
        return view('user.contact');
     }

    public function SendMsg(Request $request){

         // return $request->all();
          $this->validate($request,[
           'name'     => 'required',
           'email' => 'required|max:250',
           // 'phone' => 'required',
           'phone' => 'required|regex:/(01)[0-9]{9}/|max:11',
           'subject' => 'required|max:50',
           'message' => 'required|max:250',
       ]);
         
         $item = new Contact();
           // @dd($item);
         $item->name = $request->name;
         $item->email = $request->email;
         $item->phone = $request->phone;
         $item->subject = $request->subject;
         $item->message = $request->message;
          // @dd($item);
         $item->save();
        
        
         return redirect()->route('user.contact')->with('successMsg','Contact information send');

    }
}
