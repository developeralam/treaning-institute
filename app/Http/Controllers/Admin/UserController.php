<?php

namespace App\Http\Controllers\Admin;

use App\SiteConfig;
use App\User;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Illuminate\Support\Facades\Hash;
use DB;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = User::where('role','!=',2 )->get();
        $siteconf = SiteConfig::first();
        return view('admin.user.index',compact('items','siteconf'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all(); 
        // dd($roles);
        return view('admin.user.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request,[
            'name'     => 'required',
            'email'     => 'required',
            'password'     => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        // $user->roles = $request->roles;
        // dd(bcrypt($request->password));
        $user->save();
        return redirect()->route('user.index')->with('message','User Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = User::findOrFail($id);
        $roles = Role::all(); 
        return view('admin.user.edit',compact('item','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'     => 'required',
            'email'     => 'required',
            // 'password'     => 'required',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        // $user->password = Hash::make($request->password);
        // $user->password = bcrypt($request->password);
        // $user->roles = $request->roles;
        $user->save();
        return redirect()->route('user.index')->with('message','User Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('message','User Successfully Deleted');
    }



    
    public function updatePassword(Request $request){

        $validatedData = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
        ]);
        
        // $p = Hash::make($request->get('old_password'));
        // dd($p);
        if (!(Hash::check($request->get('old_password'), Auth::user()->password))) {
            // The passwords not matches
            //return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
            return response()->json(['errors' => ['current'=> ['Current password does not match']]], 422);
        }
        //uncomment this if you need to validate that the new password is same as old one

        if(strcmp($request->get('old_password'), $request->get('new_password')) == 0){
            //Current password and new password are same
            //return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
            return response()->json(['errors' => ['current'=> ['New Password cannot be same as your current password']]], 422);
        }
  
        //Change Password
        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($request->get('new_password'));
        $user->save();
        return redirect()->back();
    }
       

       



}
