<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Experience;
use App\User;
use App\Education;
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
        $experiences=Experience::all()->where('user_id',auth()->user()->id);
        $educations=Education::all()->where('user_id',auth()->user()->id);
        $skills=auth()->user()->skills;
        $awards=auth()->user()->awards;
        $interests=auth()->user()->interests;
     

        
        return view('home',compact('experiences','educations' ,'skills','awards','interests'));
    }
    public function dashboard(){
        $social_links=User::findOrFail(auth()->user()->id)->social_links;
        if ($social_links){
            $facebook=$social_links['facebook'];
            $github=$social_links['git_hub'];
            $twitter=$social_links['twitter'];
            $linkedIn=$social_links['linked_in'];
            return view('adminDashboard',compact('facebook','github','twitter','linkedIn'));
        }else{
            $facebook="";
            $github="";
            $twitter="";
            $linkedIn="";
           
            return view('adminDashboard',compact('facebook','github','twitter','linkedIn'));
        }
      
       
       
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
    
    public function add_experience(Request $request){
       
        $experience = Experience::create([
            'user_id' => auth()->user()->id,
            'company_name'=>$request->company_name,
            'designation' => $request->designation,
            'job_description' => $request->job_description,
            'start_date' =>$request->start_date,
            'end_date' => $request->end_date
        ]);

        return redirect('dashboard')->with(["message2"=>"Information updated successfully..!!"]);
    }
    public function show_experiences(){
        $experiences=Experience::all()->where('user_id',auth()->user()->id);
        return view('experience.experienceShow',compact('experiences'));
    }
    public function delete_experiences($id){
        $exp=Experience::findOrFail($id);
        $exp->delete();
        return back()->with(['message'=>'deleted succesfully']);
    }
    public function create_education(Request $request){
        $education=Education::create([
            'user_id'=>auth()->user()->id,
            'institution' => $request->institution,
            'program' => $request->program,
            'gpa'=>$request->gpa,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date
        ]);

        return back()->with(['message3'=>'entry added successfully']);
    }
    public function show_education(){
        $educations=Education::all()->where('user_id',auth()->user()->id);
        return view('education.show',compact('educations'));
    }
    public function delete_education($id){
        $education=Education::findOrFail($id);
        $education->delete();
        return back()->with(['message'=>'entry deleted successfully']);

    }
    public function add_more_info(){


        return view('addmoreInfo');
    }
    public function add_skills(Request $request){
        $user=Auth::user();
        $prev_skills=$user->skills;
        $skills=$request->skills;
        if(!$prev_skills == null){
            $skills=array_merge($skills,$prev_skills);
        }
       
        $user->update([
            'skills' => $skills
        ]);
        return response(['message' => "skill added successfully"]);
    }
    public function add_awards(Request $request){
        $user=Auth::user();
        $prev_awards=$user->awards;
        $awards=$request->awards;
       
        if(!$prev_awards== null){
            $awards=array_merge($awards,$prev_awards);
      
        }
     
        $user->update([
            'awards' => $awards
        ]);
        return response(['message' => "award added successfully"]);
    }
    public function fetch_skills_awards(){
        $skills=auth()->user()->skills;
        $awards=auth()->user()->awards;
        if(!$skills){
            $skills=array();
        }
        if(!$awards){
            $awards=array();
        }

        return response(['skills'=>$skills,'awards'=>$awards]);
    }
    public function fetch_interests(){
        return response(['interests'=>auth()->user()->interests]);
    }
    public function add_interests(Request $request){
        $user=Auth::user();
        $user->update([
            'interests' => $request->interests,
        ]);
        return response(['message' => "Interests added successfully"]);
    }
}
