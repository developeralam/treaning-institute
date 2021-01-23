<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Contact;
use Illuminate\Http\Request;
use App\SiteConfig;

class ContactController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
      $siteconf = SiteConfig::first();
      $items  = Contact::all();
      return view('admin.contact.index',compact('items','siteconf'));
    }

    public function show(Contact $item){
      $siteconf = SiteConfig::first();
    	return view('admin.contact.show', compact('item','siteconf'));
    }

    public function destroy($id){
          $item = Contact::findOrFail($id);
          $item->delete();
          return redirect()->back();

    }

}
