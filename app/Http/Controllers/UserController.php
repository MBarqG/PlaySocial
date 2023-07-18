<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Logger\ConsoleLogger;

class UserController extends Controller
{
    public function open(){
        return view('WelcomePage');
    }
    
    //show SignUp window
    public function SignUp(){
        return view('SignUp');
    }

    // Store user
    public function store(Request $request){
        $formfilds = $request->validate([
            'name'=> ['required', 'min:3'],
            'email' => ['required','email', Rule::unique('users','email')],
            'password' => 'required|confirmed|min:8'
        ]);
        $PP = $request->file("profile_picture");
        $PP_name = time() . "." . $PP->getClientOriginalExtension();
        $validation['filename'] = $PP_name;
        $path = $PP->storeAs('profile_picture', $PP_name ,'public');
        $formfilds['profile_picture'] = 'storage/'.$path;



        //Hash Password
        $formfilds['password'] = bcrypt($formfilds['password']);

        // Create User
        $user = User::create($formfilds);
        
        auth()->login($user);

        
        return redirect()->route('Profile');
    }

    // Logout User
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('WelcomePage');
    }

    public function OpenProfile(){
        $videos =  DB::table("contents")->select("id","title",'description','path','thumbnail','duration','created_at')->where('user_id','=',auth()->id())->get();
        return view('Profile',['videos' => $videos]);
    }

    public function OpenSaved(){
        $saved =  DB::table("likes")->select('content_id')->where("user_id", '=' ,auth()->id())->pluck('content_id');
        $videos =  DB::table("contents")->select("id","title",'description','path','thumbnail','duration','created_at')->whereIn('id', $saved)->get();
        return view('savedvideos',['videos' => $videos]);
    }

    // Show Login Form
    public function login() {
        return view('LogIn');
    }


    // Authenticate User
    public function authenticate(Request $request) {
        $formFields = $request->validate([
             'email' => ['required','email'],
             'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect()->route('Profile');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }
}
