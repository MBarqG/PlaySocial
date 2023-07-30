<?php

namespace App\Http\Controllers;

use App\Models\Follows;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function open()
    {
        return view('WelcomePage');
    }

    //show SignUp window
    public function SignUp()
    {
        return view('SignUp');
    }

    // Store user
    public function store(Request $request)
    {
        $formfilds = $request->validate([
            'name' => ['required', 'min:3','regex:/^[A-Za-z0-9\s]+$/'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:8'
        ]);
        //Hash Password
        $formfilds['password'] = bcrypt($formfilds['password']);

        // Create User
        $user = User::create($formfilds);

        auth()->login($user);


        return redirect()->route('Profile');
    }

    // Logout User
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('WelcomePage');
    }

    public function OpenProfile()
    {
        $videos =  DB::table("contents")->select("id", "title", 'description', 'path', 'thumbnail', 'duration', 'created_at')->where('user_id', '=', auth()->id())->get();
        $FollowList = DB::table("Follows")->select("creator_id")->where('subscriber_id', '=', auth()->id())->get();
        return view('Profile', ['videos' => $videos, 'FollowList' => $FollowList]);
    }

    public function OpenSaved()
    {
        $saved =  DB::table("likes")->select('content_id')->where("user_id", '=', auth()->id())->pluck('content_id');
        $videos =  DB::table("contents")->select("id", "user_id", "title", 'description', 'path', 'thumbnail', 'duration', 'created_at')->whereIn('id', $saved)->get();
        $FollowList = DB::table("Follows")->select("creator_id")->where('subscriber_id', '=', auth()->id())->get();
        return view('savedvideos', ['videos' => $videos, 'FollowList' => $FollowList]);
    }

    // Show Login Form
    public function login()
    {
        return view('LogIn');
    }


    // Authenticate User
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect()->route('Profile');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }


    //Follow logic
    public function Follow(Request $request)
    {
        $info = $request->validate([
            'creator_id' => ['required']
        ]);
        $info['subscriber_id'] = auth()->id();
        Follows::create($info);
        return back();
    }

    public function unFollow(Request $request)
    {
        $info = $request->validate([
            'creator_id' => ['required']
        ]);
        DB::table("Follows")->where("creator_id", "=", $info["creator_id"])->where('subscriber_id', '=', auth()->id())->delete();
        return back();
    }

    public function checkIfFollow($id)
    {
        $Followed = DB::table("Follows")->select('subscriber_id', 'creator_id')->where("creator_id", "=", $id)->get();

        $FollowedbyUser = DB::table("Follows")->select('subscriber_id', 'creator_id')->where("creator_id", "=", $id)->where('subscriber_id', '=', auth()->id())->get();

        if (count($FollowedbyUser) == 1) {
            return [true, count($Followed)];
        } elseif (count($FollowedbyUser) == 0) {
            return [false, count($Followed)];
        }
    }
    //settings
    //show settings page
    public function settings()
    {
        $videos =  DB::table("contents")->select("id", "title", 'description', 'thumbnail')->where('user_id','=', auth()->id())->get();
        $FollowList = DB::table("Follows")->select("creator_id")->where('subscriber_id', '=', auth()->id())->get();
        return view('SettingsPage',['videos' => $videos, 'FollowList' => $FollowList]);
    }
    //update user info
    public function updateUser(Request $request){
        $user = User::find(auth()->id());
        if(empty($request->get("name"))){
            $name = $user->name;
        }
        else{
            $name = $request->get("name"); 
        }
        
        if(empty($request->file("profile_picture"))){
            $profile_picture = $user->profile_picture;
        }
        else{
        $PP = $request->file("profile_picture");
        $PP_name = time() . "." . $PP->getClientOriginalExtension();
        $validation['filename'] = $PP_name;
        $path = $PP->storeAs('profile_picture', $PP_name, 'public');
        $profile_picture = 'storage/' . $path;
        }
        DB::table('users')->where('id','=',auth()->id())->update(['name'=> $name, "profile_picture" =>$profile_picture]);
        return redirect()->route('Profile');
    }

    public function DeleteVideo(Request $request)
    {
        $videosToDelete = $request->input('videosToDelete');

        if (!empty($videosToDelete)) {
            DB::table('contents')->whereIn('id', $videosToDelete)->delete();
        }

        return redirect()->back()->with('success', 'Selected videos deleted successfully.');
    }

    // show upgrade account page
    public function Showupgrade(){
        return view("UpdateAccount", ['selectedOption' => 'option1']);
    }






}
