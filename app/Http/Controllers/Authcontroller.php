<?php
namespace social\Http\Controllers;
use social\Models\User;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller{
    public function getSignup(){
        return view('dsa.signup');
    }
    public function postSignup(Request $request){

        $this->validate($request,[
            'email'=>'required|unique:users|email|max:255',
             'username'=>'required|unique:users|alpha_dash|max:20',
            'password'=>'required|min:6',
            'first_name'=>'required|',
            'last_name'=>'required|',


        ]);
        User::create([
            'email'=>$request->input('email'),
            'username'=>$request->input('username'),
            'password'=>bcrypt($request->input('password')),
            'first_name'=>$request->input('first_name'),
            'last_name'=>$request->input('last_name'),
            'year'=>$request->input('year'),
            'profile_pic'=>'no_image.jpg'
        ]);
        return redirect()->route('home')->with('info','your account has been created you can now sign in');
    }
    public function getSignin(){
        return view('dsa.signin');
    }
    public function postSignin(Request $request) {
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required'

        ]);
            if(!Auth::attempt($request->only(['email','password']),$request->has('remember'))){
                return redirect()->back()->with('info','we could not sign you in with those details');
            }


            return redirect()->route('home')->with('info','you are now signed in');
    }
    public function getSignout(){
        Auth::logout();
        return redirect()->route('home');
    }
}










?>
