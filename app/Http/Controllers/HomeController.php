<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        return view('home');
    }
    public function dashboard(){
        $social_links=User::findOrFail(auth()->user()->id)->social_links;
       $facebook=$social_links['facebook'];
       $github=$social_links['git_hub'];
       $twitter=$social_links['twitter'];
       $linkedIn=$social_links['linked_in'];
       
        return view('adminDashboard',compact('facebook','github','twitter','linkedIn'));
    }
    public function updateAbout(Request $request){
        
    
        $user=Auth::user();
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone_no'=>$request->phone_no,
            'address'=>$request->address,
            'social_links'=>$request->social_links,
            'about'=>$request->about
        ]);
      
        return redirect('dashboard')->with(["message"=>"Information updated successfully..!!"]);
    }
}
